<?php
/* src/View/Helper/GlobalHelper.php (using other helpers) */

namespace App\View\Helper;

use Cake\View\Helper;

class GlobalHelper extends Helper
{
    public $helpers = ['Html'];

    public function typePayments($type = null, $pos = null)
    {
        $res = '';
        $type_payments = [
            0 => 'Efectivo',
            1 => 'Tarjeta de Credito',
            2 => 'Cheque'
        ];

        if($type == 'list')
        {
            $res = $type_payments;
        }
        elseif($type == 'one')
        {
            $res = $type_payments[$pos];
        }

        return $res;
    }

    public function stateDescriptor($type = null, $pos = null)
    {
        $res = '';
        $states = [
            0 => 'Desactivo',
            1 => 'Activo'
        ];

        if($type == 'list')
        {
            $res = $states;
        }
        elseif($type == 'one')
        {
            $res = $states[$pos];
        }

        return $res;
    }


}
