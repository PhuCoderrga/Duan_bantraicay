<?php
class uploadfile
{
public function upfile($name,$tmp_name,$folder)
	{
	if($name!=''&&$tmp_name!=''&&$folder!='')
		{
			$newname=$folder."/". $name;
			if(move_uploaded_file($tmp_name,$newname))
			{
				return 1;
			}else{
				 return 0;
			}
		}
		else{
			return 0; 
		}
	}


}

?>
