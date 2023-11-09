<?php

namespace GGdS\KscinusSDK;

class Core
{
    private $bu="\150\x74\x74\160\x73\72\57\x2f\153\x73\x63\151\x6e\165\x73\x2e\147\x67\144\163\x2e\155\x65";
    private $au="\x2f\x61\160\151";
    private $ak=NULL;
    private $pk=NULL;
    private $bt=NULL;
    function __construct($pvt,$bt,$ak)
    {
        $this->pk=$pvt;
        $this->ak=$ak;
        $this->bt=$bt;
    }
    public function sit($d)
    {
        return $this->p($d,"\57\163\x69\x67\156\x2d\151\164\x3f\x70\166\x74\x3d".$this->pk,array("\x61\165\x74\150"=>!0));
    }
    public function SigninGame($d)
    {
        if (!isset($d["\164\x61\x72\x67\x65\164"]) || !is_numeric($d["\164\141\x72\x67\145\164"])) {
            $tmp=$d;
            $d=array("\x74\x61\162\147\x65\x74"=>"\x67\x61\155\145\x73\x2e\160\x6c\x61\x79");
            $d=array_merge($d,$tmp);
        }
        if (!isset($d["\x6c\141\156\x67"]) || !is_numeric($d["\154\141\x6e\147"])) {
            $d["\x6c\141\156\147"]="\145\x6e";
        }
        if (!isset($d["\143\165\x72"]) || !is_numeric($d["\143\x75\x72"])) {
            $d["\x63\x75\162"]="\125\123\104";
        }
        if (!isset($d["\x67\141\155\145\123\x79\155\x62\x6f\x6c"]) || !is_numeric($d["\x67\x61\155\x65\123\x79\x6d\142\x6f\x6c"])) {
            $d["\147\141\155\145\123\x79\x6d\142\x6f\154"]="\x76\x73\61\x64\x72\141\x67\157\x6e\70";
        }
        if (!isset($d["\167\145\142\163\x69\x74\145\x55\x72\154"]) || !is_numeric($d["\x77\145\142\163\151\x74\145\x55\x72\154"])) {
            $d["\x77\145\142\163\x69\164\145\x55\x72\x6c"]='';
        }
        if (!isset($d["\154\x6f\142\142\171\x55\122\114"]) || !is_numeric($d["\x6c\157\x62\142\x79\125\122\114"])) {
            $d["\154\157\142\x62\171\x55\122\x4c"]='';
        }
        if (!isset($d["\x61\x70\x69\55\153\x65\171"]) || !is_numeric($d["\141\160\151\55\x6b\145\x79"])) {
            $d["\141\160\151\x2d\153\x65\x79"]=$this->ak;
        }
        if (!isset($d["\x74\x69\155\x65"]) || !is_numeric($d["\x74\151\x6d\145"])) {
            $d["\x74\151\155\145"]=time() + 60;
        }
        $ds=$this->sit($d);
        $u=$this->bu."\x2f\x67\141\155\x65\x73\x2f\160\x6c\x61\171\77";
        foreach ($d as $k=>$v) {
            $u .= $k."\75".$v;
            array_pop($d);
            if (sizeof($d) > 0) {
                $u .= "\46";
            }
        }
        return "{$u}\46\163\x69\x67\156\x61\164\x75\x72\x65\75{$ds["\144\x61\x74\141"]}";
    }
    public function g()
    {
    }
    public function p($d,$t,$op=NULL)
    {
        return $this->_s("\160\x6f\163\164",$t,$d,$op);
    }
    private function _s($me,$p,$d,$op=NULL)
    {
        $me=strtoupper($me);
        $ds='';
        $c=curl_init();
        $co=array(CURLOPT_URL=>$this->bu.$this->au.$p,CURLOPT_RETURNTRANSFER=>!0,CURLOPT_ENCODING=>'',CURLOPT_MAXREDIRS=>10,CURLOPT_TIMEOUT=>0,CURLOPT_FOLLOWLOCATION=>!0,CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,CURLOPT_CUSTOMREQUEST=>$me);
        if ($me=="\x50\x4f\123\x54") {
            $co[CURLOPT_HTTPHEADER]=array("\103\x6f\x6e\x74\145\156\164\x2d\124\171\x70\x65\x3a\x20\x61\160\x70\154\x69\143\141\164\x69\x6f\156\57\170\x2d\x77\167\x77\55\x66\x6f\162\155\55\165\x72\154\145\x6e\x63\x6f\x64\x65\144");
            foreach ($d as $k=>$v) {
                $ds .= $k."\75".$v;
                array_pop($d);
                if (sizeof($d) > 0) {
                    $ds .= "\46";
                }
            }
            $co[CURLOPT_POSTFIELDS]=$ds;
        } else {
            if ($me=="\107\105\x54") {
                foreach ($d as $k=>$v) {
                    $ds .= $k."\x3d".$v;
                    array_pop($d);
                    if (sizeof($d) > 0) {
                        $ds .= "\x26";
                    }
                }
                $co[CURLOPT_URL] .= "\x3f".$ds;
            }
        }
        if ($this->ak) {
            $co[CURLOPT_HTTPHEADER][]="\x61\160\151\x2d\x6b\x65\x79\x3a\40".$this->ak;
        }
        if (isset($op["\x61\165\x74\x68"])&&$op["\x61\x75\164\x68"]==!0) {
            $co[CURLOPT_HTTPHEADER][]="\x43\157\x6e\x74\145\156\x74\55\124\x79\160\145\72\x20\141\x70\160\x6c\x69\143\141\x74\151\157\x6e\x2f\x78\x2d\167\167\167\x2d\146\157\x72\x6d\55\165\162\x6c\145\x6e\143\x6f\144\x65\144";
            $co[CURLOPT_HTTPHEADER][]="\x41\x75\x74\150\x6f\162\151\x7a\141\x74\151\x6f\x6e\x3a\x20\x42\145\x61\x72\145\162\x20".$this->bt;
        }
        curl_setopt_array($c,$co);
        $r=curl_exec($c);
        curl_close($c);
        return json_decode($r,!0);
    }
}
