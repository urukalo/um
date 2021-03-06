<?php

class validate
{
    public function String($values)
    {
        if (!is_string($this->source[$name])) {
            return false;
        } else {
            return true;
        }
    }

    public function Regex($values, $pattern)
    {
        if (!preg_match("'".$pattern."'", $values)) {
            return false;
        } else {
            return true;
        }
    }

    public function Numeric($values)
    {
        if (filter_var($values, FILTER_VALIDATE_INT) != true) {
            return false;
        } else {
            return true;
        }
    }

    public function Email($values)
    {
        if (filter_var($values, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function EmailInjection($values)
    {
        if (preg_match('((?:\n|\r|\t|%0A|%0D|%08|%09)+)i', $values)) {
            return false;
        } else {
            return true;
        }
    }

    public function Float($values)
    {
        if (filter_var($values, FILTER_VALIDATE_FLOAT) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function Url($values)
    {
        if (filter_var($values, FILTER_VALIDATE_URL) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function Date($values, $format = 'YYYY/MM/DD')
    {
        switch ($format):
            case 'YYYY/MM/DD':
            case 'YYYY-MM-DD':
                list($y, $m, $d) = preg_split('/[-\.\/ ]/', $values);
        break;

        case 'YYYY/DD/MM':
            case 'YYYY-DD-MM':
                list($y, $d, $m) = preg_split('/[-\.\/ ]/', $values);
        break;

        case 'DD-MM-YYYY':
            case 'DD/MM/YYYY':
                list($d, $m, $y) = preg_split('/[-\.\/ ]/', $values);
        break;

        case 'MM-DD-YYYY':
            case 'MM/DD/YYYY':
                list($m, $d, $y) = preg_split('/[-\.\/ ]/', $values);
        break;

        case 'YYYYMMDD':
                $y = substr($values, 0, 4);
        $m = substr($values, 4, 2);
        $d = substr($values, 6, 2);
        break;

        case 'YYYYDDMM':
                $y = substr($values, 0, 4);
        $d = substr($values, 4, 2);
        $m = substr($values, 6, 2);
        break;

        default:
                return false;
        break;
        endswitch;

        if (checkdate($m, $d, $y) == false) {
            return false;
        } else {
            return true;
        }
    }

    public function Ipv4($values)
    {
        if (filter_var($values, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function Ipv6($values)
    {
        if (filter_var($values, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
            return false;
        } else {
            return true;
        }
    }
}
