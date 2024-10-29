<?php

namespace App\Helpers;

use setasign\Fpdi\Fpdi;

class PDF extends Fpdi
{
    var $angle = 0;

    function Rotate($angle, $x = -1, $y = -1)
    {
        if ($x == -1) {
            $x = $this->getX();
        }
        if ($y == -1) {
            $y = $this->getY();
        }
        if ($this->angle != 0) {
            $this->Error('Rotate: You can\'t rotate the page after you started outputting it.');
        }
        $this->angle = $angle;
        $this->setXY($x, $y);
        $this->startTransform();
    }

    function startTransform()
    {
        $this->_out('q ' . $this->angle . ' 0 0 ' . $this->angle . ' ' . $this->getX() . ' ' . $this->getY() . ' cm');
    }

    function StopTransform()
    {
        $this->angle = 0;
        $this->_out('Q');
    }

    function Text($x, $y, $txt)
    {
        $this->StopTransform();
        parent::Text($x, $y, $txt);
        $this->startTransform();
    }
    function SetAlpha($alpha)
    {
        if ($alpha < 0) {
            $alpha = 0;
        }
        if ($alpha > 1) {
            $alpha = 1;
        }
        $this->_out(sprintf('q %.2F g', $alpha));
    }
}
