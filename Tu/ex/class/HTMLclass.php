<?php
class HTML{
    static  public function createSelectBox($arrData,$name ,$keySelected = null,$class = null){
        $xhtml = "";
        if(!empty($arrData)){
            $xhtml = "<select name= '$name' class='$class'>";
           foreach(  $arrData   as $key => $value ){
                if ($keySelected== $key && $keySelected !=null){
                    $xhtml.=   "<option selected = 'true' value='$key' name='$key'>$value</option>";
                    //$arrData[$value]
                }else{
                    $xhtml.=   "<option value='$key'> $value </option>";
                }
           }
            $xhtml.= '</select>';
        }
        return $xhtml;
    }

}