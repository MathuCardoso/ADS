import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.InputStreamReader;
import java.util.ArrayList;

public class GerarPrecoVendas {

    private BufferedReader reader;

    public static void main(String[] args) throws Exception {
        GerarPrecoVendas gpv = new GerarPrecoVendas();
        gpv.reader = new BufferedReader(new InputStreamReader(System.in));
        String arq_entrada;
        if (gpv.isFileNull(0)) {
            System.out.println("Digite o nome do arquivo de entrada: ");
            arq_entrada = gpv.reader.readLine() + ".csv";
            if (arq_entrada.equals(".csv")) {
                arq_entrada = "preco_custo.csv";
            }
            gpv.gerarArquivoEntrada(arq_entrada);
            gpv.updateFilesList(arq_entrada, 0);
        } else {
            arq_entrada = gpv.getArqEntrada();
        }
        gpv.menu(arq_entrada);
    }

    private void menu(String arq_entrada) throws Exception {
        int op;
        while (true) {
            System.out.println("==========MENU==========");
            System.out.println("[1] - [EXIBIR ITENS]");
            System.out.println("[2] - [ADICIONAR ITENS]");
            System.out.println("[3] - [ADICIONAR MARGEM DE LUCRO]");
            System.out.println("[4] - [GERAR AQUIVO 'comprar.csv']");
            System.out.println("[5] - [SAIR]");
            System.out.println("Escolha uma das opções acima: ");
            op = Integer.parseInt(this.reader.readLine());

            switch (op) {
                case 1 -> verPrecoCusto(arq_entrada);
                case 2 -> adicionarItem(arq_entrada);
                case 3 -> adicionarMargem(arq_entrada);
                case 4 -> gerarArquivoComprar(arq_entrada);
                case 5 -> {
                    System.out.println("Saindo...");
                    return;
                }
                default -> System.out.println("Opção inválida. Tente novamente");
            }
        }
    }

    private void verPrecoCusto(String file_name) {
        try (BufferedReader fileReader = new BufferedReader(new FileReader(file_name))) {
            String linha;
            String[] vetCampos;
            fileReader.readLine();
            System.out.println("| CÓDIGO | ESTOQUE | NOME_PRODUTO | PREÇO_CUSTO | CATEGORIA |");
            System.out.println("=======================================================================");
            while ((linha = fileReader.readLine()) != null) {
                vetCampos = linha.split(";");
                System.out.println("| " + vetCampos[0] + " | "
                        + vetCampos[1] + " | "
                        + vetCampos[2] + " | "
                        + "R$" + vetCampos[3] + " | "
                        + vetCampos[4] + " | "
                );
                System.out.println("=======================================================================");
            }
        } catch (Exception e) {
            System.out.println("Erro ao ler arquivo" + e.getMessage());
        }
    }

    private void gerarArquivoEntrada(String file_name) {
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
            writer.newLine();
            writer.write("06;35;Teclado Mecânico Redragon;250,00;Periféricos");
            writer.newLine();
            writer.write("07;25;Headset HyperX Cloud II;480,00;Áudio e Headsets");
            writer.newLine();
            writer.write("08;1;Monitor LG UltraWide 29\";1100,00;Monitores");
            writer.newLine();
            writer.write("09;3;Caixa de Som JBL Charge 5;650,00;Áudio e Portáteis");
            writer.newLine();
            writer.write("10;2;Controle Xbox Series;300,00;Acessórios Gaming");
            System.out.println("Arquivo gerado com sucesso");
        } catch (Exception e) {
            System.out.println("Erro ao gerar arquivo: " + e.getMessage());
        }
    }

    private void adicionarMargem(String arq_entrada) throws Exception {
        float margem;
        float preco_venda;
        float preco_custo;
        ArrayList<String> vetCamposAtualizados = new ArrayList<>();
        System.out.println("Digite a margem de lucro (%): /ex: '30'/");
        margem = Float.parseFloat(this.reader.readLine());
        margem = margem / 100;

        try (BufferedReader fileReader = new BufferedReader(new FileReader(arq_entrada))) {
            String line;
            String[] vetCampos;
            fileReader.readLine();
            while ((line = fileReader.readLine()) != null) {
                vetCampos = line.split(";");
                preco_custo = Float.parseFloat(vetCampos[3].replace(",", "."));
                preco_venda = preco_custo * (1 + margem);
                vetCampos[3] = String.valueOf(preco_venda);

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
        String[] vetFiles;
        vetFiles = fileReader.readLine().split(";");
        if (vetFiles[1].equals("0")) {
            System.out.println("Digite o nome do arquivo de saída: ");
            arq_saida = this.reader.readLine() + ".csv";
            if (arq_saida.equals(".csv")) {
                arq_saida = "preco_venda.csv";
            }
            String filesHeader = "arq_entrada;arq_saida;arq_comprar";
            String filesLine = vetFiles[0] + ";" +
                    arq_saida + ";" +
                    vetFiles[2];
            BufferedWriter writer = new BufferedWriter(new FileWriter("files.csv"));
            writer.write(filesHeader);
            writer.newLine();
            writer.write(filesLine);
            writer.close();
            gerarArquivoSaida(vetCamposAtualizados, arq_saida);
        } else {
            arq_saida = vetFiles[1];
            gerarArquivoSaida(vetCamposAtualizados, arq_saida);
        }

    }

    private void adicionarItem(String arq_entrada) throws Exception {
        this.reader = new BufferedReader(new FileReader(arq_entrada));
        String linha;
        String ultimoCodigo = null;
        reader.readLine();
        while ((linha = reader.readLine()) != null) {
            int codigo = Integer.parseInt(linha.split(";")[0]) + 1;
            ultimoCodigo = String.valueOf(codigo);
        }
        this.reader.close();

        this.reader = new BufferedReader(new InputStreamReader(System.in));
        System.out.println("==========ADICIONAR ITEM==========");
        String codigo = ultimoCodigo;
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

    private void gerarArquivoSaida(ArrayList<String> vetCampos, String file_name) {
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(file_name))) {
            writer.write("codigo;nome_produto;preco_venda");
            writer.newLine();
            for (String line : vetCampos) {
                writer.write(line);
                writer.newLine();
            }
            System.out.println("Arquivo gerado/atualizado com sucesso");
        } catch (Exception e) {
            System.out.println("ERRO: " + e.getMessage());
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
        } catch (Exception e) {
            System.out.println("Erro ao gerar/atualizar arquivo: " + e.getMessage());
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

    private String getArqEntrada() {
        try (BufferedReader reader = new BufferedReader(new FileReader("files.csv"))) {
            reader.readLine();
            String linha = reader.readLine();
            if(linha != null)
                return reader.readLine().split(";")[0];
            else {
                return "Nenhuma linha para ler.";
            }
        } catch (Exception e) {
            return "NÃO FOI POSSÍVEL CARREGAR O ARQUIVO 'files.csv': \n'" + e.getMessage();
        }
    }

}