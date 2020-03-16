<?php

class AppPacienteAPI extends Controller {

    function AppPacienteAPI() {

        parent::Controller();
        $this->load->model('login_model', 'login_m');
        $this->load->model('app_model', 'app');
        $this->load->model('ambulatorio/guia_model', 'guia');

    }

    function index(){
        echo json_encode('WebService');
    }

    

    function login(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        $usuario = $json_post->user;
        $senha = $json_post->password;
        $empresa = 1;

        $resposta = $this->login_m->autenticarpacienteweb($usuario, $senha, $empresa);
        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->id = $usuario;
            $obj->data = new stdClass();
            $obj->data->nome = $resposta[0]->nome;
            $obj->data->cpf = $resposta[0]->cpf;
        }else{
            $obj->status = 404;
            $obj->id = 0;
        }
        echo json_encode($obj); 

// {						
//     "status": 200,      /* 200 = Requisição Ok. */
//     "id": 48665684      /* id do paciente no sistema STG. */,
//     "data": {
//         "nome": "Johnny Alves",     /* Nome do paciente. */
//         "cpf": "84684684654",       /* CPF do paciente. */
//     }
// }
    }

    function risco_cirurgico(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        
        $paciente_id = $json_post->paciente_id;
        $questionario = $json_post->questionario;
        // var_dump($questionario); 
        // die;
        $resposta = $this->app->gravarRiscoCirurgico($paciente_id, $questionario);
        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
        }else{
            $obj->status = 404;
        }
        echo json_encode($obj); 

    }

    function buscar_procedimento_convenio() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        $convenio_id = $json_post->convenio_id;
        
        $grupo = @$json_post->grupo;
        if (empty($grupo)) {
            $grupo = 'CONSULTA';
        }

        if (isset($convenio_id)) {
            $result = $this->app->listarautocompleteprocedimentosatendimentonovo($convenio_id, @$grupo);
        } 
// var_dump($result); die;
        if(count($result) > 0){
            foreach ($result as $key => $value) {
                $result[$key]->valortotal = number_format($value->valortotal, 2 , ',', '.');
                # code...
            }

        }
        $obj = new stdClass();
        if(count($result) > 0){
            $obj->status = 200;
            $obj->data = $result;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function buscar_clinicas() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
       
        $result = $this->app->listarclinicaprocedimento();
        
        $obj = new stdClass();
        if(count($result) > 0){
            $obj->status = 200;
            $obj->data = $result;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function buscar_datas() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        $result = array();
        // var_dump($_GET); die;
        if (isset($_GET['procedimento_id']) && isset($_GET['empresa_id'])) {
            $result = $this->app->horariosdisponiveisclinica($_GET['procedimento_id'], $_GET['empresa_id']);
        }
        
        $obj = new stdClass();
        if(count($result) > 0){
            $obj->status = 200;
            $obj->data = $result;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        echo json_encode($obj); 
    }

    function listar_horarios_medicos() {
        $result = array();
        // var_dump($_GET); die;
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        $procedimento_id = $json_post->procedimento_id;
        $empresa_id = $json_post->empresa_id;
        $data = $json_post->data;
        
        $result = $this->app->listarhorariosmedicos($procedimento_id, $empresa_id, $data);
        
        $objetoCerto = array();
        $medico_id = 0;
        $contador = -1;
        // echo '<pre>';
        // var_dump($result); 
        // die;
        foreach ($result as $key => $value) {
            $horario = date("H:i",strtotime($value->inicio));
            $agenda_exames_id = $value->agenda_exames_id;
            
            if($value->medico_agenda != $medico_id){
                $contador++;
                $objetoCerto[$contador] = new stdClass();
                $objetoCerto[$contador]->medico_id = $value->medico_agenda;
                $objetoCerto[$contador]->nome = $value->medico;
                if($value->sigla != ''){
                    $objetoCerto[$contador]->sigla = $value->sigla;
                }else{
                    $objetoCerto[$contador]->sigla = "CRM";
                }
                
                $objetoCerto[$contador]->conselho = $value->conselho;
                $objetoCerto[$contador]->horario = array();
                $objetoCerto[$contador]->agenda_exames_id = array();
                array_push($objetoCerto[$contador]->horario, $horario);
                array_push($objetoCerto[$contador]->agenda_exames_id, $agenda_exames_id); 
            }else{
                // var_dump($contador);
                array_push($objetoCerto[$contador]->horario, $horario);
                array_push($objetoCerto[$contador]->agenda_exames_id, $agenda_exames_id);  
            }
            
            $medico_id = $value->medico_agenda;
   
        }
        // echo '<pre>';
        // var_dump($objetoCerto); 
        // die;
        
        $obj = new stdClass();
        if(isset($objetoCerto)){
            $obj->status = 200;
            $obj->data = $objetoCerto;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }


    function gravar_agendamento(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        
        $paciente_id = $json_post->paciente_id;
        $agenda_exames_id = $json_post->agenda_exames_id;
        $procedimento_id = $json_post->procedimento_id;
        $empresa_id = $json_post->empresa_id;

        $retorno = $this->app->gravarAgendamento($empresa_id, $paciente_id, $agenda_exames_id, $procedimento_id);
        $obj = new stdClass();
        if($retorno != false){
            $obj->status = 200;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;
        echo json_encode($obj); 
    }

    function pesquisa_satisfacao(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        
        $paciente_id = $json_post->paciente_id;
        $questionario = $json_post->questionario;
        // var_dump($questionario); 
        // die;
        $resposta = $this->app->gravarPesquisaSatisfacao($paciente_id, $questionario);
        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
        }else{
            $obj->status = 404;
        }
        echo json_encode($obj); 

    }

    function agenda_calendario(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        $medico_id = $_GET['medico_id'];
        $data = $_GET['data'];
        $empresa_id = $_GET['empresa_id'];
        $data_array = array();
        $resposta = $this->app->listarhorarioscalendarioAPP($medico_id, $data, $empresa_id); 
	//echo "<pre>";
        $i = 0;
        foreach ($resposta as $item) {
	    $retorno = new stdClass();
            $i++;
            // $retorno['id'] = $i;
            if ($item->situacao == 'LIVRE') {
                $retorno->title = $item->contagem . ' Horários Livres';
            } else {
                $retorno->title = $item->contagem . ' Pacientes';
            }

            $retorno->start = $item->data;
            if ($item->situacao == 'LIVRE') {
                $retorno->backgroundColor = '#00e676';
                $retorno->borderColor = '#00e676';
                $retorno->textColor = '#000000';
            } else {
                $retorno->backgroundColor = '#b71c1c';
                $retorno->borderColor = '#b71c1c';
                $retorno->textColor = '#ffffff';
            }
           
            $data_array[] = $retorno;
            //var_dump($retorno);
            //var_dump($data_array);
            //echo '<hr>';
        }  
        // echo '<pre>';
        // var_dump($data_array); 
        // die;

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $data_array;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function agenda(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        //$json_post = json_decode(file_get_contents("php://input"));
        //var_dump($_GET); 
        //die;
        $medico_id = $_GET["medico_id"];
        $data = $_GET["data"];
        $empresa_id = $_GET["empresa_id"];
        $resposta = $this->app->listarhorariosAPP($medico_id, $data, $empresa_id);        
        // echo '<pre>';
        // var_dump($resposta); 
        // die;

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function historico_exame(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        $paciente_id = $_GET['paciente_id'];

        $resposta = $this->app->listarhistoricoAPPEspec($paciente_id, 'EXAME');        
        // echo '<pre>';
        // var_dump($resposta); 
        // die;

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function listar_botoes(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        $empresa_id = $_GET['empresa_id'];
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $resposta = $this->app->listarBotoes($empresa_id);    

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta[0];
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function busca_mensalidades() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        // echo '<pre>';
        // var_dump($json_post); 
        // die;
        // $paciente_id = $json_post->paciente_id;
        $paciente_id = $_GET['paciente_id'];

        // verificarcarenciaweb
        // verificarcarenciaweb
        $paciente_inf = $this->guia->listarpacientepacienteidantigo($paciente_id);
        // var_dump($paciente_inf); die;
        $paciente_antigo_id = $paciente_id;
        $cpf = $paciente_inf[0]->cpf;
        $obj = new stdClass();
        
        $base_url = base_url();
        $return = file_get_contents("{$base_url}autocomplete/mensalidadesAPI?paciente_antigo_id=$paciente_antigo_id&cpf=$cpf");
        $resposta = json_decode($return);
        // var_dump($resposta);
        // die;
        // echo json_encode($resposta);
        
        if($resposta != NULL){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        
        echo json_encode($obj); 
    }

    function busca_carterinha_virtual() {
        // $json_post = json_decode(file_get_contents("php://input"));
        // echo '<pre>';
        // var_dump($json_post); 
        // die;
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $paciente_id = $_GET['paciente_id'];

        // verificarcarenciaweb
        $paciente_inf = $this->guia->listarpacientepacienteidantigo($paciente_id);
        // var_dump($paciente_inf); die;
        $paciente_antigo_id = $paciente_id;
        $cpf = $paciente_inf[0]->cpf;
        $obj = new stdClass();
        // Dessa forma, se a flag estiver desativada o sistema manda zero pro fidelidade
        // daí o fidelidade não pesquisa pelo ID e sim pelo CPF.
        //    echo "<pre>";
        $base_url = base_url();
        $return = file_get_contents("{$base_url}autocomplete/impressaoCarteiraWeb?paciente_id=$paciente_antigo_id&cpf=$cpf");
        $resposta = $return;
        // var_dump("{$base_url}autocomplete/impressaoCarteiraWeb?paciente_id=$paciente_antigo_id&cpf=$cpf");
        // die;
        // echo json_encode($resposta);
        
        if($resposta != NULL){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }

        echo json_encode($obj); 
    }

    function historico_consulta(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        $paciente_id = $_GET['paciente_id'];

        $resposta = $this->app->listarhistoricoAPPEspec($paciente_id, 'CONSULTA');        
        // echo '<pre>';
        // var_dump($resposta); 
        // die;

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function gravar_solicitar_agendamento(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        
        $paciente_id = $json_post->paciente_id;
        $data = $json_post->data;
        $hora = $json_post->hora;
        $procedimento_id = $json_post->procedimento_id;
        $procedimento_text = $json_post->procedimento_text;
        $convenio_text = $json_post->convenio_text;

        $retorno = $this->app->gravarSolicitarAgendamento($paciente_id, $data, $hora, $procedimento_id, $procedimento_text, $convenio_text);
        $obj = new stdClass();
        if($retorno != false){
            $obj->status = 200;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;
        echo json_encode($obj); 
    }

    function listar_solicitar_agenda() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));

        $paciente_id = $_GET['paciente_id'];
       
        $result = $this->app->listarsolicitacaoagendamento($paciente_id);
        
        $obj = new stdClass();
        if(count($result) > 0){
            $obj->status = 200;
            $obj->data = $result;
        }else{
            $obj->status = 404;
            $obj->data = [];
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function posts_blog(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        // $medico_id = $json_post->medico_id;
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $resposta = $this->app->listarPostsBlog();    

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function busca_empresas(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        // $medico_id = $json_post->medico_id;
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $resposta = $this->app->listarEmpresas();    

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function enviarNotificacao($mensagem){
        $resposta = $this->app->buscarHashDispositivoPaciente();    
        $headers = array();
        // echo '<pre>';
        // var_dump($resposta); 
        // die;
        if(count($resposta) > 0){
            $hash = '';
            $hash_array = array();
            foreach ($resposta as $key => $value) {
                $hash_array[] = $value->hash;
            }
            $hash = json_encode($hash_array);
            
            $url = 'https://onesignal.com/api/v1/notifications';
            $headers[] = 'Content-Type: application/json; charset=utf-8';
            $headers[] = 'Authorization: Basic ZTVmZTU2NjEtZDU1My00NzQzLTllZTYtMzFkMjJlMmEzZWZi';
            $ch = curl_init();
            $body = '{
                "app_id": "13964cbb-2421-4e58-b040-0ad8f2b2e9fa",
                "include_player_ids": '. $hash .',
                "data": {"foo": "bar"},
                "contents": {"en": "'. "$mensagem" .'"}
            }';
            // var_dump($body);
            // die;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

            $result = curl_exec($ch);
            // var_dump($result); die;
            curl_close($ch);
            
            return true;
        }else{
            return false;
        }

    }

    function registrar_dispositivo(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        
        $paciente_id = $_GET['paciente_id'];
        $hash = $_GET['indentificacao_dispositivo'];
        
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $resposta = $this->app->registrarDispositivoPaciente($paciente_id, $hash);    

        $obj = new stdClass();
        if(count($resposta) > 0 && $resposta != false){
            $obj->status = 200;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function busca_convenios(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        // $medico_id = $json_post->medico_id;
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $resposta = $this->app->listarConvenios();    
        foreach ($resposta as $key => $value) {
            $resposta[$key]->image = '';
            if(file_exists('./' . $value->caminho_logo) && $value->caminho_logo != ''){
                // $resposta[$key]->image = 1; 
                $resposta[$key]->image = base64_encode(file_get_contents(base_url() . $value->caminho_logo));
            }
        }

        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function busca_medicos(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
        $grupo = '';
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $resposta = $this->app->listarmedicos($grupo);    
        foreach ($resposta as $key => $value) {
            $resposta[$key]->grupos = json_decode($value->grupos);
        }
        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $resposta;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }

    function busca_especialidade(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: content-type");
        // $json_post = json_decode(file_get_contents("php://input"));
        // var_dump($json_post); 
        // die;
       
        // echo '<pre>';
        // var_dump($texto_add); 
        // die;
        $array = array();
        $resposta = $this->app->listargrupos(0);    
        if(count($resposta) > 0){
         
            foreach ($resposta as $key => $value) {
                $array[$key] = $value->nome;
            }
        }
        $obj = new stdClass();
        if(count($resposta) > 0){
            $obj->status = 200;
            $obj->data = $array;
        }else{
            $obj->status = 404;
        }
        // echo '<pre>';
        // var_dump($obj); 
        // die;

        echo json_encode($obj); 
    }
    
  
}
