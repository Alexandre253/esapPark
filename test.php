<?php
include_once 'conectaBD.php';
include_once 'funcoesBD.php';
//$id = $_GET[''];
$horarioEntrada = "horario_entrada";
$cod_visita = "cod_visita";

$conn = conexaoBanco();
$query = "";     
$cod = 1;
$now = date("Y-m-d H:i:s");
$dados = array('horario_entrada' => $now);
$where = array('cod_visita'=>1);
/*$dbress = pg_update($conn,$where,$dados);

if(!$dbress){
    echo "Query não executada";
}
else
{
    header("Location: guarita.php");
}
*/

function updateStocks($now, $cod){
        $query = 'UPDATE public.planilha'
        .'SET horario_entrada = :horario_entrada'
         .'= WHERE cod_visita = :cod_visita" ;';
        $stmt = $this->pdo->prepare($query);

        // bind values to the statement
        $stmt->bindValue(':horario_entrada', $now);
        $stmt->bindValue(':cod_visita', $cod);
        
        $stmt->execute();

        // return the number of row affected
        return $stmt->rowCount();

    }
    $pdo = new PDO($dns,$usuario,$senha,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $updateDemo= new PostgresSQLPHPUpdate($pdo);
    $affectedRows = $updateDemo->updateStocks($now,$cod);
    echo $affectedRows;
?>