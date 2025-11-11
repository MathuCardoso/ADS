<?php

namespace App\controller;

use App;
use App\controller\Controller;
use App\model\Equipe;
use App\model\Piloto;
use App\repository\EquipeDAO;
use App\repository\PilotoDAO;
use App\service\PilotoService;
use PDOException;

class PilotoController extends Controller
{
    private PilotoService $pilotoS;
    private PilotoDAO $pilotoD;
    private EquipeDAO $equipeD;

    public function __construct()
    {
        $this->pilotoS = new PilotoService();
        $this->pilotoD = new PilotoDAO();
        $this->equipeD = new EquipeDAO();
    }

    public function list()
    {
        return $this->pilotoD->list();
    }

    public function index()
    {

        $this->loadView(
            'piloto/pilotos',
            [
                'pilotos' => $this->list(),
                'equipes' => $this->equipeD->list(),
            ]
        );
    }

    public function create()
    {

        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
        $idade = is_numeric($_POST['idade']) ? trim($_POST['idade']) : null;
        $nacional = isset($_POST['nacional']) ? trim($_POST['nacional']) : null;
        $foto = isset($_FILES['foto']) &&
            $_FILES['foto']['size'] > 0  ? $_FILES['foto'] :
            App::URL_ASSETS . "homem.png";
        $idEquipe = is_numeric($_POST['equipe']) ? trim($_POST['equipe']) : null;

        $piloto = new Piloto();
        $piloto->setNome($nome);
        $piloto->setIdade($idade);
        $piloto->setNacionalidade($nacional);
        $piloto->setFotoPerfil($foto);
        $equipe = new Equipe();
        $equipe->setId($idEquipe);
        $piloto->setEquipe($equipe);

        $erros = $this->pilotoS->validate($piloto);

        if (empty($erros)) {
            try {
                $this->pilotoD->insert($piloto);
                header("location: " . App::URL_BASE . "pilotos");
                exit;
            } catch (PDOException $p) {
                echo "Erro ao inserir piloto.";
                echo $p->getMessage();
                exit;
            }
        }
        $this->loadView(
            "piloto/pilotos",
            [
                'erros' => $erros,
                'pilotos' => $this->list()
            ]
        );
    }
}
