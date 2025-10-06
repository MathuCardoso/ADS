
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class SistemaAereo {

    BufferedReader reader;
    Companhia c;

    public static void main(String[] args) throws IOException {
        SistemaAereo sa = new SistemaAereo();
        sa.c = new Companhia();
        sa.reader = new BufferedReader(new InputStreamReader(System.in));
        System.out.println("Nome da companhia: ");
        sa.c.setNome(sa.reader.readLine());
        System.out.println("Telefone da companhia aérea: ");
        sa.c.setTelefone(sa.reader.readLine());
        sa.menu();
    }

    private void menu() throws IOException {
        String opcao = "";
        while (!opcao.equals("4")) {
            System.out.println("================================");
            System.out.println("|  [1] - CADASTRAR NOVO VÔO    |");
            System.out.println("|  [2] - CADASTRAR PASSAGEIROS |");
            System.out.println("|  [3] - LISTAR VÔOS           |");
            System.out.println("|  [4] - CONSULTAR VÔO         |");
            System.out.println("================================");
            opcao = this.reader.readLine();
            switch (opcao) {
                case "1" ->
                    cadastrarVoo();
                case "2" ->
                    cadastrarPassageiros("");
                case "3" ->
                    listarVoos();
                case "4" ->
                    consultarVoo();
                default -> {
                    System.out.println("Opção inválida.");
                }
            }
        }
    }

    private void cadastrarVoo() throws IOException {
        String diaVoo;
        String mesVoo;
        String anoVoo;
        String horaVoo;
        String minVoo;
        Voo v = new Voo();
        System.out.println("========================");
        System.out.println("====CADASTRO DE VÔOS====");
        System.out.println("========================");
        System.out.println("Código de vôo: ");
        v.setCodigoVoo(reader.readLine());
        System.out.println("Origem do vôo: ");
        v.setOrigem(reader.readLine());
        System.out.println("Destino de vôo: ");
        v.setDestino(reader.readLine());
        System.out.println("Digite o DIA do vôo: ");
        diaVoo = reader.readLine();
        System.out.println("Digite o MÊS do vôo: ");
        mesVoo = reader.readLine();
        System.out.println("Digite o ANO do vôo: ");
        anoVoo = reader.readLine();
        v.setData(diaVoo + "/" + mesVoo + "/" + anoVoo);
        System.out.println("Digite a HORA do vôo: ");
        horaVoo = reader.readLine();
        System.out.println("Digite o MINUTO do vôo: ");
        minVoo = reader.readLine();
        v.setHorario(horaVoo + ":" + minVoo);
        c.setVoo(v);

        String opcao;
        System.out.println("Você deseja cadastrar os passageiros para este vôo? [S][N]");
        opcao = reader.readLine().toUpperCase().trim();

        while (!(opcao.equals("S") || opcao.equals("SIM") || opcao.equals("N") || opcao.equals("NAO") || opcao.equals("NÃO"))) {
            System.out.println("Opção inválida!\n [S] - SIM\n [N] - NÃO");
            opcao = reader.readLine().toUpperCase().trim();
        }

        if (opcao.equals("S") || opcao.equals("SIM")) {
            cadastrarPassageiros(v.getCodigoVoo());
        }

    }

    private void cadastrarPassageiros(String codVoo) throws IOException {
        if (codVoo.equals("")) {
            System.out.println("Digite o código do vôo: ");
            codVoo = reader.readLine();
        }
        for (int i = 0; i < c.getQtdVoos(); i++) {
            Voo v = c.getVoo(i);
            if (v.getCodigoVoo().equals(codVoo)) {
                for (int j = v.getQtdPassageiros(); j < (50 - v.getQtdPassageiros()); j++) {
                    System.out.printf("Nome do passageiro[%d]: ", j + 1);
                    String nome = reader.readLine();
                    if (nome.equals("")) {
                        break;
                    }
                    Passageiro p = new Passageiro();
                    p.setNome(nome);
                    System.out.println("CPF do passageiro: ");
                    p.setCpf(reader.readLine());

                    System.out.println("Idade: ");
                    p.setIdade(Integer.parseInt(reader.readLine()));

                    System.out.println("Número de assento: ");
                    p.setNumAssento(Integer.parseInt(reader.readLine()));
                    while (v.mesmoAssento(p.getNumAssento()) == true) {
                        System.out.println("Este assento já pertence a outra pessoa.\nEscolha outro assento: ");
                        p.setNumAssento(Integer.parseInt(reader.readLine()));
                    }
                    v.setPassageiros(p);
                }
            } else {
                System.out.println("Vôo não encontrado!");
            }
        }
    }

    private void listarVoos() {
        if (c.getQtdVoos() == 0) {
            System.out.println("Nenhum vôo cadastrado");
            return;
        }
        System.out.println("====================");
        System.out.println("VÔOS CADASTRADOS");
        for (int i = 0; i < c.getQtdVoos(); i++) {
            Voo v = c.getVoo(i);
            System.out.println("Código do vôo: " + v.getCodigoVoo() + "\n"
                    + "Origem: " + v.getOrigem() + "\n"
                    + "Destino: " + v.getDestino() + "\n"
                    + "Data: " + v.getData() + "\n"
                    + "Horário: " + v.getHorario() + "\n"
                    + "Quantidade de passageiros: " + v.getQtdPassageiros() + "\n"
                    + "Assentos livres: " + v.getAssentosLivres() + "\n");
        }
    }

    private void consultarVoo() throws IOException {
        System.out.println("===============");
        System.out.println("CONSULTA DE VÕOS");
        System.out.println("Digite o código do vôo");
        String codigoVoo = reader.readLine();
        boolean found = false;
        for (int i = 0; i < c.getQtdVoos(); i++) {
            Voo v = c.getVoo(i);
            if (v.getCodigoVoo().equals(codigoVoo)) {
                System.out.println("[PASSAGEIROS DO VÔO]");
                int posPass = 0;
                System.out.println("Assentos livres: " + v.getAssentosLivres());
                while (v.getPassageiro(posPass) != null) {
                    String linha = "Nome: " + v.getPassageiro(posPass).getNome();
                    linha += " - cpf: " + v.getPassageiro(posPass).getCpf();
                    linha += " - idade: " + v.getPassageiro(posPass).getIdade();
                    linha += " - Número de assento: " + v.getPassageiro(posPass).getNumAssento();
                    System.out.println(linha);
                    posPass++;
                }
                found = true;
                menu();
            }
        }
        if (!found) {
            System.out.println("Vôo não encontrado!");
        }
    }

}
