
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

        System.out.println("Digite o nome do arquivo de entrada: ");
        arq_entrada = gpv.reader.readLine() + ".csv";
        if (arq_entrada.equals(".csv")) {
            arq_entrada = "preco_custo.csv";
        }

        gpv.gerarArquivoEntrada(arq_entrada);

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
            op = Integer.parseInt(reader.readLine());
            System.out.println("\n");

            switch (op) {
                case 1 -> verPrecoCusto(arq_entrada);
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

    private void verPrecoCusto(String file_name) throws Exception {
        BufferedReader fileReader = new BufferedReader(new FileReader(file_name));
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
    }

    private void gerarArquivoEntrada(String file_name) throws Exception {
        BufferedWriter writer = new BufferedWriter(new FileWriter(file_name));
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
        writer.close();
        System.out.println("Arquivo gerado com sucesso");
    }

    private void adicionarMargem(String file_name) throws Exception {
        float margem;
        float preco_venda;
        float preco_custo;
        String[] vetCamposAtualizados = new String[22];
        System.out.println("Digite a margem de lucro (%): /ex: '30'/");
        margem = Float.parseFloat(reader.readLine());
        margem = margem / 100;

        try (BufferedReader fileReader = new BufferedReader(new FileReader(file_name))) {
            String line;
            String[] vetCampos;
            fileReader.readLine();
            int i = 0;
            while ((line = fileReader.readLine()) != null) {
                vetCampos = line.split(";");
                preco_custo = Float.parseFloat(vetCampos[3].replace(",", "."));
                preco_venda = preco_custo * (1 + margem);
                vetCampos[3] = String.valueOf(preco_venda);

                line = vetCampos[0] + ";"
                        + vetCampos[2] + ";"
                        + vetCampos[3];

                vetCamposAtualizados[i] = line;
                i++;
            }
        }

        System.out.println("Digite o nome do arquivo de saída: ");
        file_name = reader.readLine() + ".csv";
        if (file_name.equals(".csv")) {
            file_name = "preco_venda.csv";
        }

        gerarArquivoSaida(vetCamposAtualizados, file_name);

    }

    private void gerarArquivoSaida(String[] vetCampos, String file_name) {
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(file_name))) {
            writer.write("codigo;nome_produto;preco_venda");
            writer.newLine();
            int i = 0;
            String line;
            while ((line = vetCampos[i]) != null) {
                writer.write(line);
                i++;
                writer.newLine();
            }
            writer.close();

            System.out.println("Arquivo gerado/atualizado com sucesso");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }

    }

    private void gerarArquivoComprar(String arq_entrada) throws Exception {
        String arq_header;
        ArrayList<String> estoqueCampos = new ArrayList<>();
        int i;
        BufferedReader fileReader = new BufferedReader(new FileReader(arq_entrada));
        String line;
        String[] vetCampos;
        i = 0;
        arq_header = fileReader.readLine();
        while ((line = fileReader.readLine()) != null) {
            vetCampos = line.split(";");
            if (Integer.parseInt(vetCampos[1]) < 10) {
                estoqueCampos.add(line);
                i++;
            }
        }
        BufferedWriter writer = new BufferedWriter(new FileWriter("comprar.csv"));
            writer.write(arq_header);
            writer.newLine();
            for (i = 0; i < estoqueCampos.size(); i++) {
                writer.write(estoqueCampos.get(i));
                writer.newLine();
            }
            writer.close();
            System.out.println("Arquivo gerado/atualizado com sucesso");
        }
}