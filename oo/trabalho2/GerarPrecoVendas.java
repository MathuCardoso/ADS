import java.io.*;
import java.util.ArrayList;

public class GerarPrecoVendas {

    private BufferedReader reader;

    public static void main(String[] args) throws Exception {
        GerarPrecoVendas gpv = new GerarPrecoVendas();
        gpv.gerarArqFiles();
        gpv.reader = new BufferedReader(new InputStreamReader(System.in));
        if (gpv.isFileNull(0)) {
            gpv.gerarArquivoEntrada();
        }
        String arq_entrada = gpv.getArqName(0);
        gpv.menu(arq_entrada);
    }

    private void menu(String arq_entrada) throws Exception {
        int op;
        while (true) {
            System.out.println("============MENU============");

            if (isFileNull(0)) {
                System.out.println("[1] - [GERAR ARQUIVO DE ENTRADA]");
            } else {
                System.out.println("[1] - [EXIBIR ITENS A PREÇO DE CUSTO]");
                System.out.println("[2] - [ADICIONAR ITENS]");
                if (isFileNull(1)) {
                    System.out.println("[3] - [ADICIONAR MARGEM DE LUCRO]");
                } else {
                    System.out.println("[3] - [ATUALIZAR MARGEM DE LUCRO]");
                }
                if (isFileNull(2)) {
                    System.out.println("[4] - [GERAR ARQUIVO COM ESTOQUE < 10]");
                } else {
                    System.out.println("[4] - [ATUALIZAR ESTOQUE < 10]");
                }
                if (!isFileNull(1)) {
                    System.out.println("[5] - [EXIBIR ITENS A PREÇO DE VENDA]");
                }
                if (!isFileNull(2)) {
                    System.out.println("[6] - [EXIBIR ESTOQUE < 10]");
                }
            }
            if (!isFileNull(0) || !isFileNull(1) || !isFileNull(2)) {
                System.out.println("[7] - [Excluir Arquivo]");
            }
            System.out.println("[0] - [SAIR]");
            System.out.println("Escolha uma das opções acima: ");

            try {
                op = Integer.parseInt(this.reader.readLine());
            } catch (NumberFormatException e) {
                System.out.println("Por favor, digite um número válido.");
                continue;
            }
            switch (op) {
                case 1 -> {
                    if (isFileNull(0)) {
                        this.gerarArquivoEntrada();
                    } else {
                        this.verPrecoCusto(this.getArqName(0));
                    }
                }
                case 2 -> this.adicionarItem(arq_entrada);
                case 3 -> this.adicionarMargem(arq_entrada);
                case 4 -> this.gerarArquivoComprar(arq_entrada);
                case 5 -> this.verPrecoVenda(getArqName(1));
                case 6 -> this.verEstoqueBaixo(getArqName(2));
                case 7 -> this.deleteArq();
                case 0 -> {
                    System.out.println("Saindo...");
                    return;
                }
                default -> System.out.println("Opção inválida.");
            }
        }
    }

    private void verPrecoCusto(String file_name) {
        try (BufferedReader fileReader = new BufferedReader(new FileReader(file_name))) {
            String linha;
            String[] vetCampos;
            fileReader.readLine();
            System.out.println("| CÓDIGO | ESTOQUE | NOME_PRODUTO | PREÇO_CUSTO | CATEGORIA |");
            System.out.println("================================================");
            while ((linha = fileReader.readLine()) != null) {
                vetCampos = linha.split(";");
                System.out.println("| " + vetCampos[0] + " | "
                        + vetCampos[1] + " | "
                        + vetCampos[2] + " | "
                        + "R$" + vetCampos[3] + " | "
                        + vetCampos[4] + " | "
                );
                System.out.println("================================================");
            }
        } catch (Exception e) {
            System.out.println("Erro ao ler arquivo " + e.getMessage());
        }
    }

    private void verPrecoVenda(String file_name) throws Exception {
        if (!this.isFileNull(1)) {
            try (BufferedReader reader = new BufferedReader(new FileReader(file_name))) {

                String linha;
                String[] vetCampos;
                reader.readLine();
                System.out.println("| CÓDIGO | NOME_PRODUTO | PREÇO_VENDA |");
                System.out.println("=======================================================================");
                while ((linha = reader.readLine()) != null) {
                    vetCampos = linha.split(";");
                    System.out.println("| " + vetCampos[0] + " | "
                            + vetCampos[1] + " | "
                            + vetCampos[2] + " | "
                    );
                    System.out.println("=======================================================================");
                }

            } catch (IOException e) {
                System.out.println("ERRO AO LER ARQUIVO " + file_name + "\n"
                        + e.getMessage());
            }
        } else {
            System.out.println("O arquivo informado não existe.");
        }
    }

    private void verEstoqueBaixo(String file_name) {
            try (BufferedReader reader = new BufferedReader(new FileReader(file_name))) {
                String linha;
                String[] vetCampos;
                reader.readLine();
                System.out.println("| CÓDIGO | ESTOQUE | NOME_PRODUTO | PREÇO_CUSTO | CATEGORIA |");
                System.out.println("=======================================================================");
                while ((linha = reader.readLine()) != null) {
                    vetCampos = linha.split(";");
                    System.out.println("| " + vetCampos[0] + " | "
                            + vetCampos[1] + " | "
                            + vetCampos[2] + " | "
                            + "R$" + vetCampos[3] + " | "
                            + vetCampos[4] + " | "
                    );
                    System.out.println("=======================================================================");
                }

            } catch (IOException e) {
                System.out.println("ERRO AO LER ARQUIVO " + file_name + "\n"
                        + e.getMessage());
            }
    }

    private void gerarArquivoEntrada() throws Exception {
        System.out.println("Digite o nome do arquivo de entrada.\nPadrão: 'preco-custo.csv':");
        this.reader = new BufferedReader(new InputStreamReader(System.in));
        String file_name = this.reader.readLine() + ".csv";
        if (file_name.equals(".csv"))
            file_name = "preco_custo.csv";
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(file_name))) {
            String arq_header = "codigo;estoque;nome_produto;preco_custo;categoria";
            writer.write(arq_header);
            writer.newLine();
            writer.write("01;15;PlayStation 5;2800,00;Consoles e Games");
            writer.newLine();
            writer.write("02;10;iPhone 17 Pro Max;6000,00;Smartphones");
            writer.newLine();
            writer.write("03;45;Mouse Logitech;180,00;Periféricos");
            writer.newLine();
            writer.write("04;20;Smart TV Samsung 55\";2550,00;Smart TV");
            writer.newLine();
            writer.write("05;12;Notebook Dell Inspiron;3600,00;Notebooks");
            System.out.println("Arquivo gerado com sucesso");
            this.updateFilesList(file_name, 0);
        } catch (Exception e) {
            System.out.println("Erro ao gerar arquivo: " + e.getMessage());
        }
    }

    private void adicionarMargem(String arq_entrada) throws Exception {
        float margem;
        float preco_venda;
        float preco_custo;
        ArrayList<String> vetCamposAtualizados = new ArrayList<>();
        while (true) {
            System.out.println("Digite a margem de lucro (%): /ex: '30'/");
            try {
                margem = Float.parseFloat(this.reader.readLine());
            } catch (NumberFormatException e) {
                System.out.println("Digite um valor válido.");
                continue;
            }
            margem = margem / 100;
            break;
        }


        try (BufferedReader fileReader = new BufferedReader(new FileReader(arq_entrada))) {
            String line;
            String[] vetCampos;
            fileReader.readLine();
            while ((line = fileReader.readLine()) != null) {
                vetCampos = line.split(";");
                preco_custo = Float.parseFloat(vetCampos[3].replace(",", "."));
                preco_venda = preco_custo * (1 + margem);
                String preco_venda_str = String.valueOf(preco_venda);
                preco_venda_str = preco_venda_str.replace(".", ",");
                vetCampos[3] = preco_venda_str;

                line = vetCampos[0] + ";"
                        + vetCampos[2] + ";"
                        + vetCampos[3];

                vetCamposAtualizados.add(line);
            }
        } catch (Exception e) {
            System.out.println("Erro ao ler arquivo: " + e.getMessage());
        }
        String arq_saida;
        BufferedReader fileReader = new BufferedReader(new FileReader("files.csv"));
        fileReader.readLine();
        if (isFileNull(1)) {
            System.out.println("Digite o nome do arquivo de saída.\nPadrão: 'preco_venda.csv' ");
            arq_saida = this.reader.readLine() + ".csv";
            if (arq_saida.equals(".csv")) {
                arq_saida = "preco_venda.csv";
            }
            gerarArquivoSaida(vetCamposAtualizados, arq_saida);
        } else {
            arq_saida = getArqName(1);
            gerarArquivoSaida(vetCamposAtualizados, arq_saida);
        }

    }

    private void gerarArquivoSaida(ArrayList<String> vetCampos, String file_name) {
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(file_name))) {
            writer.write("codigo;nome_produto;preco_venda");
            writer.newLine();
            for (String line : vetCampos) {
                writer.write(line);
                writer.newLine();
            }
            System.out.println("Arquivo gerado/atualizado com sucesso");
            this.updateFilesList(file_name, 1);
        } catch (Exception e) {
            System.out.println("ERRO AO GERAR ARQUIVO DE SAÍDA: " + e.getMessage());
        }
    }

    private void gerarArquivoComprar(String arq_entrada) {
        String arq_header = "";
        ArrayList<String> estoqueCampos = new ArrayList<>();
        int i;
        try (BufferedReader fileReader = new BufferedReader(new FileReader(arq_entrada))) {
            String line;
            String[] vetCampos;
            arq_header = fileReader.readLine();
            while ((line = fileReader.readLine()) != null) {
                vetCampos = line.split(";");
                if (Integer.parseInt(vetCampos[1]) < 10) {
                    estoqueCampos.add(line);
                }
            }
        } catch (Exception e) {
            System.out.println("Erro ao ler arquivo: " + e.getMessage());
        }
        try (BufferedWriter writer = new BufferedWriter(new FileWriter("comprar.csv"))) {
            writer.write(arq_header);
            writer.newLine();
            for (i = 0; i < estoqueCampos.size(); i++) {
                writer.write(estoqueCampos.get(i));
                writer.newLine();
            }
            writer.close();
            System.out.println("Arquivo gerado/atualizado com sucesso");
            this.updateFilesList("comprar.csv", 2);
        } catch (Exception e) {
            System.out.println("Erro ao gerar/atualizar arquivo: " + e.getMessage());
        }
    }

    private void adicionarItem(String arq_entrada) throws Exception {
        this.reader = new BufferedReader(new FileReader(arq_entrada));

        this.reader = new BufferedReader(new InputStreamReader(System.in));
        System.out.println("==========ADICIONAR ITEM==========");
        String codigo = this.getLastCode(arq_entrada);
        System.out.println("Digite o nome do produto: ");
        String nome_produto = this.reader.readLine();
        System.out.println("Digite o estoque: ");
        String estoque = this.reader.readLine();
        System.out.println("Digite o preço de custo: ");
        String preco_custo = this.reader.readLine();
        System.out.println("Digite a categoria do produto: ");
        String categoria = this.reader.readLine();

        try (BufferedWriter writer = new BufferedWriter(new FileWriter(arq_entrada, true))) {
            writer.newLine();
            writer.write(codigo + ";" +
                    estoque + ";" +
                    nome_produto + ";" +
                    preco_custo + ";" +
                    categoria);
            System.out.println("Item adicionado com sucesso.");
        } catch (Exception e) {
            System.out.println("Erro ao adicionar item: " + e.getMessage());
        }
    }

    private boolean isFileNull(int pos) throws Exception {
        BufferedReader fileReader = new BufferedReader(new FileReader("files.csv"));
        String[] vetFilesLine;
        String filesLine;

        fileReader.readLine();
        filesLine = fileReader.readLine();
        vetFilesLine = filesLine.split(";");

        return vetFilesLine[pos].equals("0");
    }

    private void deleteArq() {
        try (BufferedReader reader = new BufferedReader(new FileReader("files.csv"))) {
            this.reader = new BufferedReader(new InputStreamReader(System.in));
            int op;

            reader.readLine();
            String[] fileNames = reader.readLine().split(";");

            System.out.println("==========ARQUIVOS==========");
            while (true) {
                int i = 0;
                while (i < fileNames.length && fileNames[i] != null) {
                    if (fileNames[i].equals("0")) {
                        i++;
                        continue;
                    }
                    System.out.println("[" + (i + 1) + "] - " + fileNames[i].toUpperCase());
                    i++;
                }
                try {
                    System.out.println("Escolha um dos arquivos acima a ser deletado: ");
                    op = Integer.parseInt(this.reader.readLine());
                } catch (NumberFormatException e) {
                    System.out.println("Digite uma opção válida.");
                    continue;
                }

                int index = op - 1;

                try {
                    if (fileNames[index] != null) {
                        if (fileNames[index].equals("0")) {
                            System.out.println("Escolha uma opção válida.");
                            continue;
                        }
                        File arq = new File(fileNames[index]);
                        if (arq.delete()) {
                            System.out.println("Arquivo excluído com sucesso.");
                            this.updateFilesList(String.valueOf(0), index);
                            return;
                        }
                    }
                } catch (ArrayIndexOutOfBoundsException e) {
                    System.out.println("Escolha uma opção válida.");
                }
            }
        } catch (IOException e) {
            System.out.println("ERRO AO LER ARQUIVO 'files.csv'." + e.getMessage());
        }
    }

    private void updateFilesList(String fileName, int pos) {
        String[] vetFilesLine = new String[3];
        try (BufferedReader fileReader = new BufferedReader(new FileReader("files.csv"))) {
            String filesLine;

            fileReader.readLine();
            filesLine = fileReader.readLine();

            if (filesLine != null) {
                vetFilesLine = filesLine.split(";");
            }

            switch (pos) {
                case 0 -> vetFilesLine[0] = fileName;
                case 1 -> vetFilesLine[1] = fileName;
                case 2 -> vetFilesLine[2] = fileName;
                default -> System.out.println("Posição inválida.");
            }
        } catch (Exception e) {
            System.out.println("ERRO AO LER 'files.csv'" + e.getMessage());
            return;
        }
        try (BufferedWriter writer = new BufferedWriter(new FileWriter("files.csv"))) {
            String filesHeader = "arq_entrada;arq_saida;arq_comprar";
            writer.write(filesHeader);
            writer.newLine();
            writer.write(vetFilesLine[0] + ";"
                    + vetFilesLine[1] + ";"
                    + vetFilesLine[2]
            );
        } catch (Exception e) {
            System.out.println("ERRO AO ATUALIZAR LISTA DE ARQUIVOS: " + e.getMessage());
        }
    }

    private String getArqName(int pos) {
        try (BufferedReader reader = new BufferedReader(new FileReader("files.csv"))) {
            reader.readLine();
            String linha = reader.readLine();
            if (linha != null)
                return linha.split(";")[pos];
            else {
                return "Nenhuma linha para ler.";
            }
        } catch (IOException e) {
            return "NÃO FOI POSSÍVEL CARREGAR O ARQUIVO 'files.csv': \n'" + e.getMessage();
        }
    }

    private String getLastCode(String file_name) {
        try (BufferedReader reader = new BufferedReader(new FileReader(file_name))) {
            String linha;
            String ultimoCodigo = null;
            reader.readLine();
            while ((linha = reader.readLine()) != null) {
                int codigo = Integer.parseInt(linha.split(";")[0]) + 1;
                ultimoCodigo = String.valueOf(codigo);
            }
            return ultimoCodigo;
        } catch (IOException e) {
            return "NÃO FOI POSSÍVEL LER O ARQUIVO. " + e.getMessage();
        }
    }

    private void gerarArqFiles() {
        try (BufferedReader reader = new BufferedReader(new FileReader("files.csv"))) {
            reader.readLine();
        } catch (IOException e) {
            String arq_header = "arq_entrada;arq_saida;arq_comprar";
            try (BufferedWriter writer = new BufferedWriter(new FileWriter("files.csv"))) {
                writer.write(arq_header);
                writer.newLine();
                writer.write("0;0;0");
                System.out.println("Arquivo 'files.csv' gerado.");
            } catch (IOException j) {
                System.out.println(j.getMessage());
            }
        }
    }
}