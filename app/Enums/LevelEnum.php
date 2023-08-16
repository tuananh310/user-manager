<?php

namespace App\Enums;

enum LevelEnum:string {
    case doctor = 'Tiến sĩ';
    case masters = 'Thạc sĩ';
    case university = 'Đại học';
    case college = 'Trung cấp/ Cao đẳng';
    case primary = 'Sơ cấp';
    case high_school = 'Trung học phổ thông';
    case other = 'Yêu cầu khác';
}
