<?php
/**
 * Created by PhpStorm.
 * User: moji
 * Date: 8/25/2019
 * Time: 9:51
 */

namespace app\controllers;


class ChangeDate
{

//change shamsi to miladi function
    function jalali_to_gregorian($jy, $jm, $jd, $mod = '')
    {
        if ($jy > 979) {
            $gy = 1600;
            $jy -= 979;
        } else {
            $gy = 621;
        }
        $days = (365 * $jy) + (((int)($jy / 33)) * 8) + ((int)((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
        $gy += 400 * ((int)($days / 146097));
        $days %= 146097;
        if ($days > 36524) {
            $gy += 100 * ((int)(--$days / 36524));
            $days %= 36524;
            if ($days >= 365) $days++;
        }
        $gy += 4 * ((int)($days / 1461));
        $days %= 1461;
        if ($days > 365) {
            $gy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }
        $gd = $days + 1;
        foreach (array(0, 31, (($gy % 4 == 0 and $gy % 100 != 0) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
            if ($gd <= $v) break;
            $gd -= $v;
        }
        return ($mod == '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
    }


    function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
        $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
        if($gy > 1600){
            $jy=979;
            $gy-=1600;
        }else{
            $jy=0;
            $gy-=621;
        }
        $gy2=($gm > 2)?($gy+1):$gy;
        $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
        $jy+=33*((int)($days/12053));
        $days%=12053;
        $jy+=4*((int)($days/1461));
        $days%=1461;
        $jy+=(int)(($days-1)/365);
        if($days > 365)$days=($days-1)%365;
        if($days < 186){
            $jm=1+(int)($days/31);
            $jd=1+($days%31);
        }else{
            $jm=7+(int)(($days-186)/30);
            $jd=1+(($days-186)%30);
        }
        if($jm<10) $jm='0'.$jm;
        if($jd<10) $jd='0'.$jd;
        return($mod==='')?array($jy,$jm,$jd):$jy .$mod .$jm .$mod .$jd;
    }

    function normalize($jy, $jm, $jd){
        $Date_Miladi=$jy.'-'.$jm.'-'.$jd;;
        if($jd<10){
            $jd='0'.$jd;
            $Date_Miladi=$jy.'-'.$jm.'-'.$jd;
        }
        if($jm<10){
            $jm='0'.$jm;
            $Date_Miladi=$jy.'-'.$jm.'-'.$jd;
        }

        return $Date_Miladi;
    }

}