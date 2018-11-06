<?php
/**
 * Created by PhpStorm.
 * User: amd
 * Date: 07.08.18
 * Time: 09:19
 */

class blaH
{

    private $blah = 'BLAH!';

    /**
     * @return string
     */
    public function getBlah()
    {
        return $this->blah;
    }



    public function blub(){ echo $this->getBlah(); }


}