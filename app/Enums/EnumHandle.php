<?php

namespace App\Enums;

trait EnumHandle
{
    protected function getValueInEnum($enums, $name)
    {
        foreach ($enums as $value) {
            if ($value->name == $name) {
                return $value->value;
            }
        }
        return null;
    }

    protected function getNameInEnumByValue($enums, $value)
    {
        foreach ($enums as $enum) {
            if ($enum->value == $value) {
                return $enum->name;
            }
        }
        return null;
    }
}
