<?php

namespace GGdS\KscinusSDK;use GGdS\KscinusSDK\HttpRequests;class Core{private $v1=NULL,$pk=NULL,$v2,$v3;function __construct(){$this->v2=new HttpRequests();}public function SigninIt($d){return $this->v2->f7($d,$this->v2->f5("\x2f\163\151\x67\x6e\55\151\x74"));}public function SigninGame($d,$pk=NULL){if($pk){$this->v2->f1($pk);}if(!isset($d["\x74\x61\x72\147\x65\x74"])||!is_numeric($d["\x74\141\162\x67\145\164"])){$t=$d;$d=array("\x74\x61\162\147\145\x74"=>"\x67\141\x6d\145\163\x2e\x70\x6c\x61\x79");$d=array_merge($d,$t);}if(!isset($d["\x6c\141\x6e\147"])||!is_numeric($d["\154\x61\156\147"])){$d["\154\x61\x6e\x67"]="\145\156";}if(!isset($d["\x63\x75\x72"])||!is_numeric($d["\x63\165\x72"])){$d["\143\x75\162"]="\122\44";}if(!isset($d["\147\x61\x6d\145\123\171\155\142\x6f\154"])||!is_numeric($d["\147\141\155\x65\x53\171\155\142\157\154"])){$d["\147\x61\x6d\145\x53\171\x6d\142\x6f\154"]="\166\163\61\144\162\x61\147\x6f\x6e\70";}if(!isset($d["\167\x65\x62\x73\x69\164\x65\x55\x72\154"])||!is_numeric($d["\x77\145\142\x73\151\164\x65\x55\x72\154"])){$d["\x77\145\x62\163\151\x74\145\125\x72\x6c"]='';}if(!isset($d["\x6c\157\142\x62\x79\x55\x52\x4c"])||!is_numeric($d["\x6c\x6f\x62\142\x79\125\122\x4c"])){$d["\154\157\x62\x62\x79\125\x52\x4c"]='';}if(!isset($d["\164\x69\x6d\145"])||!is_numeric($d["\x74\151\x6d\145"])){$d["\x74\x69\155\145"]=time() + 60;}$ds=$this->SigninIt($d);$u=$this->v2->f3("\57\x67\141\155\x65\163\x2f\160\x6c\x61\x79\77");foreach($d as $k=>$v){$u.=$k."\x3d".$v;array_pop($d);if(sizeof($d)>0){$u.="\x26";}}return "{$u}\46\x73\151\147\x6e\x61\x74\x75\x72\x65\75{$ds["\x64\x61\164\x61"]}";}public function ListGames($v1){return $this->v2->f6($this->v2->f5("\x2f\x67\141\x6d\x65\163\57\154\x69\163\164"),array("\x61\160\x69\x2d\x6b\x65\x79"=>$v1));}public function CreatePlayer($d,$pk){$this->v3=new Player($d);$this->v2->f1($pk);$this->v2->f2($d["\141\160\151\x2d\x6b\x65\x79"]);return $this->v2->f7($this->v3->ta(),$this->v2->f5("\57\x70\x6c\x61\x79\145\x72\x73\57\156\145\167"));}}
