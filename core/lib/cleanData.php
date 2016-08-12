<?php

class cleanData
{
    public function GET($varName)
    {
        return addslashes(trim(@$_GET[$varName]));
    }

    public function POST($varName)
    {
        return addslashes(trim(@$_POST[$varName]));
    }

    public function URL($varName)
    {
        global $_URL;

        return addslashes(trim(@$_URL[$varName]));
    }
}
