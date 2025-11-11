<?php

namespace App\controller;

use App\controller\Controller;
use App\model\Categoria;
use App\model\Equipe;
use App\repository\CategoriaDAO;
use App\repository\EquipeDAO;
use App\service\EquipeService;
use PDOException;

class EquipeController extends Controller
{

    private CategoriaDAO $catDAO;
    private EquipeDAO $equipeDAO;
    private EquipeService $equipeServ;

    public function __construct()
    {
        $this->catDAO = new CategoriaDAO();
        $this->equipeDAO = new EquipeDAO();
        $this->equipeServ = new EquipeService();
    }

    public function index()
    {
        $this->loadView(
            'equipe/equipes',
            [
                "categoria" => $this->catDAO->list(),
                "equipes" => $this->getAll()
            ]
        );
    }

    public function getAll()
    {
        return $this->equipeDAO->list();
    }

    public function create()
    {
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
        $sede = isset($_POST['sede']) ? trim($_POST['sede']) : null;
        $cor1 = isset($_POST['cor1']) ? trim($_POST['cor1']) : null;
        $cor2 = isset($_POST['cor2']) ? trim($_POST['cor2']) : null;
        $id_categoria = isset($_POST['categoria']) ? (int)trim($_POST['categoria']) : null;

        $equipe = new Equipe();
        $equipe->setNome($nome);
        $equipe->setSede($sede);
        $equipe->setCor1($cor1);
        $equipe->setCor2($cor2);
        $cat = new Categoria();
        $cat->setId($id_categoria);
        $equipe->setCategoria($cat);

        $erros = $this->equipeServ->validate($equipe);

        if (empty($erros)) {
            try {
                $this->equipeDAO->insert($equipe);
                header("location: /equipes");
                exit;
            } catch (PDOException $p) {
                echo "ERRO AO INSERIR EQUIPE.";
                echo "<br>{$p->getMessage()}";
            }
        }


        $this->loadView("equipe/equipes", [
            "erros" => $erros,
            "equipes" => $this->getAll(),
            "categoria" => $this->catDAO->list(),
            "equipe" => $equipe
        ]);
    }
}
