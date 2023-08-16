<?php

namespace App\Http\Controllers\Admin;

use App\Common\StringHelpers;
use App\Enums\EnumHandle;
use App\Enums\GenderEnum;
use App\Enums\BranchEnum;
use App\Enums\CandidateEnum;
use App\Enums\InterviewResultEnum;
use App\Enums\LevelEnum;
use App\Enums\RankEnum;
use App\Http\Controllers\Controller;
use App\Repositories\CandidateRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use App\Repositories\SourceRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Rap2hpoutre\FastExcel\FastExcel;

class CandidateController extends Controller
{
    use EnumHandle;
    private $candidateRepo;
    private $userRepo;
    private $departmentRepo;
    private $positionRepo;
    private $sourceRepo;

    public function __construct(CandidateRepository $candidateRepo, UserRepository $userRepo, DepartmentRepository $departmentRepo, PositionRepository $positionRepo, SourceRepository $sourceRepo)
    {
        $this->candidateRepo = $candidateRepo;
        $this->userRepo = $userRepo;
        $this->departmentRepo = $departmentRepo;
        $this->positionRepo = $positionRepo;
        $this->sourceRepo = $sourceRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalCandidate = $this->candidateRepo->count();
        $datas = $this->candidateRepo->all();
        return view('candidate.index', compact('totalCandidate', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = StringHelpers::getSelectOptions($this->userRepo->all());
        $departments = StringHelpers::getSelectOptions($this->departmentRepo->all());
        $positions = StringHelpers::getSelectOptions($this->positionRepo->all());
        $sources = StringHelpers::getSelectOptions($this->sourceRepo->all());
        $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases());
        $provinces = DB::table('provinces')->get();
        $selectProvinces = StringHelpers::getSelectProvinceOptions($provinces);
        $levels = StringHelpers::getSelectEnumOptions(LevelEnum::cases());
        $branchs = StringHelpers::getSelectEnumOptions(BranchEnum::cases());
        $ranks = StringHelpers::getSelectEnumOptions(RankEnum::cases());
        // $status = StringHelpers::getSelectEnumOptions(CandidateEnum::cases());
        $interviewResults = StringHelpers::getSelectEnumOptions(InterviewResultEnum::cases());
        //$candidateStatus = StringHelpers::getSelectEnumOptions($status);

        return view('candidate.create', compact('interviewResults', 'selectProvinces', 'users', 'genders', 'sources', 'positions', 'departments', 'provinces', 'levels', 'branchs', 'ranks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, $this->candidateRepo->validateCreate());
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $input['level_value'] = $this->getValueInEnum(LevelEnum::cases(), $input['level']);
            $input['gender_value'] = $this->getValueInEnum(GenderEnum::cases(), $input['gender']);
            $input['branch_value'] = $this->getValueInEnum(BranchEnum::cases(), $input['branch']);
            $input['rank_value'] = $this->getValueInEnum(RankEnum::cases(), $input['rank']);
            $this->candidateRepo->create($input);
            return redirect()->route('admin.candidate.index')->with('success', 'Thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = $this->candidateRepo->find($id);
            if ($data) {
                $users = $this->userRepo->getAllUser();
                $departments = StringHelpers::getSelectOptions($this->departmentRepo->all(), $data->department_id);
                $positions = StringHelpers::getSelectOptions($this->positionRepo->all(), $data->position_id);
                $sources = StringHelpers::getSelectOptions($this->sourceRepo->all(), $data->source_id);
                $genders = StringHelpers::getSelectEnumOptions(GenderEnum::cases(), $data->gender);

                $provinces = DB::table('provinces')->get();
                $address = StringHelpers::getSelectProvinceOptions($provinces, $data->address);
                $household = StringHelpers::getSelectProvinceOptions($provinces, $data->household);
                $levels = StringHelpers::getSelectEnumOptions(LevelEnum::cases(), $data->level);
                $branchs = StringHelpers::getSelectEnumOptions(BranchEnum::cases(), $data->branch);
                $ranks = StringHelpers::getSelectEnumOptions(RankEnum::cases(), $data->rank);

                $receiver = StringHelpers::getSelectOptions($users, $data->receiver_id);
                $interviewer = StringHelpers::getSelectOptions($users, $data->interviewer);
                $interviewer0 = StringHelpers::getSelectOptions($users, $data->interviewer0);
                $interviewer1 = StringHelpers::getSelectOptions($users, $data->interviewer1);
                $interviewer2 = StringHelpers::getSelectOptions($users, $data->interviewer2);
                $interviewer3 = StringHelpers::getSelectOptions($users, $data->interviewer3);

                // $interviewer = StringHelpers::getSelectOptions($users, $data->interviewer);
                // $interviewer0 = StringHelpers::getSelectOptions($users, $data->interviewer0);
                // $interviewer1 = StringHelpers::getSelectOptions($users, $data->interviewer1);
                // $interviewer2 = StringHelpers::getSelectOptions($users, $data->interviewer2);
                // $interviewer3 = StringHelpers::getSelectOptions($users, $data->interviewer3);

                $interviewResults = StringHelpers::getSelectEnumOptions(InterviewResultEnum::cases());
                return view('candidate.edit', compact('data', 'interviewResults', 'address', 'household', 'users', 'genders', 'sources', 'positions', 'departments', 'provinces', 'levels', 'branchs', 'ranks', 'receiver', 'interviewer', 'interviewer0', 'interviewer1', 'interviewer2', 'interviewer3'));
            } else {
                return back()->with("error", "Không tìm thấy dữ liệu");
            }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, $this->candidateRepo->validateUpdate($id));
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $this->candidateRepo->find($id);

            $input['level_value'] = $this->getValueInEnum(LevelEnum::cases(), $input['level']);
            $input['gender_value'] = $this->getValueInEnum(GenderEnum::cases(), $input['gender']);
            $input['branch_value'] = $this->getValueInEnum(BranchEnum::cases(), $input['branch']);
            $input['rank_value'] = $this->getValueInEnum(RankEnum::cases(), $input['rank']);

            $res = $data->update($input);
            return redirect()->route('admin.candidate.index')->with('success', 'Thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }

    public function importExcel(Request $request)
    {
        $recordImported = 0;
        $recordFailed = 0;
        $file = $request->file('excel_file');
        $validatedData = $request->validate([
            'excel_file' => 'required|mimes:xlsx,csv,xls|max:10120',
        ]);
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();

        $headerStyle = $worksheet->getStyle('A1')->getFont()->getBold();
        $highestColumn = $worksheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);
        $noteColumn = Coordinate::stringFromColumnIndex($highestColumnIndex + 1);
        $worksheet->getStyle($noteColumn . '1')->getFont()->setBold($headerStyle);
        $worksheet->setCellValue($noteColumn . '1', 'Trạng thái import');

        $rows = $worksheet->toArray();
        foreach ($rows as $index => $row) {
            $input = [];
            if ($index === 0)
                continue;
            $input['name'] = $row[1];
            $input['birthday'] = strtotime($row[2]) != false ? Carbon::parse($row[2]) : null;
            $input['position_id'] = $this->positionRepo->findByPluck('name', $row[3], 'id');
            $input['department_id'] = $this->departmentRepo->findByPluck('name', $row[4], 'id');
            $input['received_time'] = strtotime($row[5]) != false ? Carbon::parse($row[5]) : null;
            $input['receiver_id'] = $this->userRepo->findByPluck('id', $row[6], 'id');
            $input['source_id'] = $this->sourceRepo->findByPluck('name', $row[7], 'id');
            $input['relationship_note'] = $row[8];
            $input['gender_value'] = $row[9];
            $input['gender'] = $this->getNameInEnumByValue(GenderEnum::cases(), $input['gender_value']);
            $input['phone_number'] = $row[10];
            $input['email'] = $row[11];
            $input['household'] = DB::table('provinces')->where('name', $row[12])->pluck('id')->first();
            $input['address'] = DB::table('provinces')->where('name', $row[13])->pluck('id')->first();
            $input['address_detail'] = $row[14];
            $input['level_value'] = $row[15];
            $input['level'] = $this->getNameInEnumByValue(LevelEnum::cases(), $input['level_value']);
            $input['branch_value'] = $row[16];
            $input['branch'] = $this->getNameInEnumByValue(BranchEnum::cases(), $input['branch_value']);
            $input['major'] = $row[17];
            $input['training_place'] = $row[18];
            $input['rank_value'] = $row[19];
            $input['rank'] = $this->getNameInEnumByValue(RankEnum::cases(), $input['rank_value']);
            $input['english'] = $row[20];
            $input['other_language'] = $row[21];
            $input['other_software'] = $row[22];
            $input['info1'] = $row[23];
            $input['info2'] = $row[24];
            $input['experience'] = $row[25];
            $input['interviewer'] = $this->userRepo->findByPluck('id', $row[26], 'id');
            $input['interview_date'] = strtotime($row[27]) != false ? Carbon::parse($row[27]) : null;
            $input['interview_comment'] = $row[28];
            $input['interviewer0'] = $this->userRepo->findByPluck('id', $row[29], 'id');
            $input['interview_date0'] = strtotime($row[30]) != false ? Carbon::parse($row[30]) : null;
            $input['interview_comment0'] = $row[31];
            $input['interviewer1'] = $this->userRepo->findByPluck('id', $row[32], 'id');
            $input['interview_date1'] = strtotime($row[33]) != false ? Carbon::parse($row[33]) : null;
            $input['interview_comment1'] = $row[34];
            $input['interviewer2'] = $this->userRepo->findByPluck('id', $row[35], 'id');
            $input['interview_date2'] = strtotime($row[36]) != false ? Carbon::parse($row[36]) : null;
            $input['interview_comment2'] = $row[37];
            $input['interviewer3'] = $this->userRepo->findByPluck('id', $row[38], 'id');
            $input['interview_date3'] = strtotime($row[39]) != false ? Carbon::parse($row[39]) : null;
            $input['interview_comment3'] = $row[40];
            $input['score'] = $row[41];
            $input['status_value'] = $row[42];
            $input['created_by'] = Auth::user()->id;
            $input['active'] = 1;

            $validator = Validator::make($input, $this->candidateRepo->validateCreate());
            $recordImported++;
            $worksheet->setCellValue($noteColumn . $index + 1, "Thành công");
            $worksheet->getStyle($noteColumn . $index + 1)->getFont()->setSize(8);
            $this->candidateRepo->create($input);

            return redirect()->route('admin.candidate.index')->with('success', 'Thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->departmentRepo->destroy($id);
            return redirect()->route('admin.candidate.index')->with('success', 'Xóa thành công');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage())->withInput();
        }
    }
}
