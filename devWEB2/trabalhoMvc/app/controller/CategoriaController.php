<?php

namespace App\controller;

use App;
use App\controller\Controller;
use App\model\Categoria;
use App\repository\CategoriaDAO;
use App\service\CategoriaService;
use App\service\Service;
use PDOException;

class CategoriaController extends Controller
{

    private CategoriaDAO $catDAO;
    private CategoriaService $catService;
    private Service $service;

    public function __construct()
    {
        $this->catDAO = new CategoriaDAO();
        $this->catService = new CategoriaService();
        $this->service = new Service();
    }

    public function index()
    {
        $this->loadView(
            'categoria/categorias',
            ['categorias' => $this->list()]
        );
    }

    public function list()
    {
        return $this->catDAO->list();
    }

    public function create()
    {
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
        $maxP = is_numeric($_POST['maxPilotos']) ? trim($_POST['maxPilotos']) : null;
        $maxE = is_numeric($_POST['maxEquipes']) ? trim($_POST['maxEquipes']) : null;
        $logo = $_FILES['logo'] ?? null;

        $categoria = new Categoria();
        $categoria->setNome($nome);
        $categoria->setMaxPilotos($maxP);
        $categoria->setMaxEquipes($maxE);
        $categoria->setLogo($logo);


        $erros = $this->catService->validate($categoria);

        if (empty($erros)) {

            try {
                $logo = $this->service->saveFile($logo, $categoria, "categorias");
                $categoria->setLogo($logo);
                $this->catDAO->insert($categoria);
                header("location: /categorias");
                exit;
            } catch (PDOException $p) {
                echo "Erro ao inserir categoria no banco de dados.";
                echo $p->getMessage();
                return;
            }
        }

        $this->loadView(
            "categoria/categorias",
            [
                "erros" => $erros,
                "categorias",
                $this->list()
            ]
        );
    }
}
