<?php

namespace App\Enums;

enum BranchEnum:string {
    case formal = 'Chính quy';
    case e_learning = 'Vừa học vừa làm';
    case remote = 'Từ xa';
    case university_transfer = 'Liên thông';
}
