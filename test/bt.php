
<?php
class Hello {
    protected $lang;

    function __construct($lang)
    {
        $this->lang = $lang;
    }
    public function greet() {
        if ( $this->lang == "fr" ) return "Bonjour";
        if ( $this->lang == "es") return "Hola";
    }

    public function getLang() {
        return $this->lang;
    }

    public function setLang($lang) {
        $this->lang = $lang;
    }
}
class social extends Hello {
    function bye() {
        if ( $this->lang == "fr" ) return 'Au revoir';
        if ( $this->lang ==  "es") return "Adios";
        return "Goodbye";
    }
}

$hi = new social("es");
echo $hi->greet()."\n";
echo $hi->bye()."\n";
echo $hi->getLang();
$hi->setLang("fr");
echo $hi->getLang();

$a = new social("fr");
echo $a->greet()."\n";
echo $a->bye();
echo $hi->greet()."\n";

?>