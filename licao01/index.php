<?php

/*
0 = Não tem festa;
1 = Tem festa;
*/
$festa = 1;

/*
perfil da pessoa;
#idade
#amigo do dono da festa
0 = Não é amiga;
1 = É amiga;
*/
$pessoa = array();
$pessoa['idade'] = 15;
$pessoa['amigo'] = 1;

/*
perfil do amigo
#idade
0 = Não esta na festa;
1 = Esta na festa;
#genero
0 = Masculino;
1 = Feminino;
*/
$amigo = array();
$amigo['festa'] = 0;
$amigo['genero']  = 1;


/*
Refrigerante;
#tipo
0 = coca normal;
1 = coca light;
#Status
0 = Vazio;
1 = Cheio;
*/
$cardapio = array();
$cardapio['tipo']   = 0;
$cardapio['status'] = 1;


//funcao para virificar a idade
function verificar_idade($idade)
{
    return ($idade>=18) ? true : false;
}

//funcao para se é amigo do dono
function amigo_dono($amigo)
{
    return ($amigo) ? true : false;
}

//funcao para verificar se a festa esta acontecendo
function festa($festa)
{
    return ($festa) ? true : false;
}

//funcao para verificar se tem amigo na festa
function amigo_na_festa($festa)
{
    return ($festa) ? true : false;
}

//funcao para ver se é coca normal ou light
function coca($coca)
{
  return ($coca) ? true : false;
}

//funcao para ver se é garrada é cheia ou vazia
function garrafa($nivel)
{
  return ($nivel) ? true : false;
}

//pergunto a idade
echo 'Segurança: Qual a sua idade?<br>';
echo 'Convidado: '.$pessoa['idade'].' anos.<br>';
//verifico se o convidado pode entrar.(Já verifico a idade e se é amigo do dono da festa)
$decisao_do_seguranca = (verificar_idade($pessoa['idade'])) ? true : amigo_dono($pessoa['amigo']);

//se for menor de idade pergunto se conhece o dono
if(!verificar_idade($pessoa['idade']))
{
  echo 'Segurança: Você conhece o dono da festa?<br>';
  echo (amigo_dono($pessoa['amigo'])) ? 'Convidado: Sim.<br>' : 'Convidado: Não.<br>';
}

echo ($decisao_do_seguranca) ? 'Segurança: Você pode entrar na festa.<br>' : 'Segurança: Você não pode entrar na festa.<br>';

//entrou na festa..verifico se esta realmente acontecendo a festa
if($decisao_do_seguranca){
  echo 'Convidado: Obrigado!<br>';
  echo 'Convidado: Será que ainda tem festa?<br>';
  echo (festa($festa)) ? 'Convidado: Ainda tem festa!<br>' : 'Convidado: Poutz! Acabou a festa!<br>';
  if(festa($festa))
  {
    //se tem amigo na festa e o genero
    $genero_amigo = ($amigo['genero']) ? 'FulanA' : 'FulanO';
    echo (amigo_na_festa($amigo['festa'])) ? 'Convidado: Olá '.$genero_amigo.'!<br>' : 'Convidado: Não conheço ninguem na festa.<br>';

    //coca Cola
    echo (coca($cardapio['tipo'])) ? 'Convidado: Quero beber Coca cola light!<br>' : 'Convidado: Quero beber Coca cola!<br>';
  }
}
