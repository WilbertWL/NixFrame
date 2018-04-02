<?php
    class DataManager {
    
        private function Active($data, $method = "Get"){
            if($method == "Get"):
                if(isset($_GET[$data])):
                    return TRUE;
                else:
                    return FALSE;
                endif;
            elseif($method == "Post"):
                if(isset($_POST[$data])):
                    return TRUE;
                else:
                    return FALSE;
                endif;
            endif;
        }
        
        public function U($bool = false, $data = "U"){
            if($bool):
                return $this->Active($data);
            else:
                if($this->Active($data)):
                    return (string)htmlspecialchars($_GET[$data]);
                else:
                    return (string)"GET Empty";
                endif;
            endif;
        }
        
        public function O($bool = false, $data = "O"){
            if($bool):
                return $this->Active($data);
            else:
                if($this->Active($data)):
                    return (string)htmlspecialchars($_GET[$data]);
                else:
                    return (string)"GET Empty";
                endif;
            endif;
        }
        
        public function I($bool = false, $data = "I"){
            if($bool):
                return $this->Active($data);
            else:
                if($this->Active($data)):
                    return (string)htmlspecialchars($_GET[$data]);
                else:
                    return (string)"GET Empty";
                endif;
            endif;
        }
        
        public function POST($data){
            if($this->Active($data, "Post")):
                return (string)htmlspecialchars($_POST[$data]);
            else:
                return (string)"Error en la utilización de POST";
            endif;
        }

        private function FileExist($filepath){
            if(file_exists($filepath)):
                return TRUE;
            else:
                return FALSE;
            endif;
        }

        public function GetFileContents($filepath, $exists = FALSE){
            if($exists):
                return (bool) $this->FileExist($filepath);
            else:
                if($this->FileExist($filepath)):
                    return file_get_contents($filepath);
                else:
                    return "<b>Error: </b> El archivo - <b>". $filepath."</b> no pudo ser encontrado.\n";
                endif;
            endif;
        }

        public function IncludeFile($filepath){
            if($this->FileExist($filepath)):
                return include_once $filepath;
            else:
                return "<b>Error: </b> El archivo - <b>". $filepath."</b> no pudo ser encontrado.\n";
            endif;
        }
    }