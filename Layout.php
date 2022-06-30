<?php
// Session start para todos arquivos
session_start();
ob_start();

// class layout para podermos definir o conteudo 1 para todos, conteudo de cada arquivo.
class Layout
{
   public $cabecalho;
   public $menu;
   public $conteudo;
   public $rodape;
   
   public  function __construct()
   {
      $this->cabecalho = "front-end/cabecalho";
      $this->menu = "front-end/menu";
      $this->conteudo="front-end/formulario";
      $this->rodape = "front-end/rodape";
   }

   public function index(){
      $this->conteudo($this->cabecalho);
      $this->conteudo($this->menu);
      $this->conteudo($this->conteudo);
      $this->conteudo($this->rodape);

   }
   public function conteudo($conteudo){
      
    include $conteudo.".php";
    
   }

}
