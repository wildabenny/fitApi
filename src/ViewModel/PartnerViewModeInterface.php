<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 2019-11-03
 * Time: 14:32
 */

namespace App\ViewModel;


interface PartnerViewModeInterface
{
    public function getOne($id);

    public function getAll();
}