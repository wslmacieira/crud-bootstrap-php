<?php
require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function index() {
    global $customers;
    $customers = find_all('customers');
}

/**
 *  Cadastro de Clientes
 */
function add() {

    if(!empty($POST['customer'])) {

        $today =  date_create('now', new DateTimeZone('America/Sao_Paulo'));

        $customer = $_POST['customer'];
        $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");

        save('customers', $customer);
        header('location: index.php');
    }
}

/**
 *  Visualização de um Cliente
 */
function view($id = null) {
    global $customer;
    $customer = find('customers', $id);
}

/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {

    global $customer;
    $customer = remove('customers', $id);
  
    header('location: index.php');
}
