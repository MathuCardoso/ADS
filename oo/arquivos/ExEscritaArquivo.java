
import java.io.BufferedWriter;
import java.io.FileWriter;

public class ExEscritaArquivo {

    public static void main(String[] args) throws Exception {
        String nomeArqSaida = "arquivos/arqSaida.csv";
        BufferedWriter arqGravacao = new BufferedWriter(new FileWriter(nomeArqSaida));

        String linha = "Produto:Preço;Estoque";
        arqGravacao.write(linha);
        arqGravacao.newLine();

        String nomeProduto = "Mouse Dell";
        String preco = "112,50";
        String estoque = "22";
        linha = nomeProduto + ";" + preco + ";" + estoque;
        arqGravacao.write(linha);

        arqGravacao.newLine();
        nomeProduto = "Mouse Logitech";
        preco = "225,99";
        estoque = "21";
        linha = nomeProduto + ";" + preco + ";" + estoque;
        arqGravacao.write(linha);

        arqGravacao.newLine();
        nomeProduto = "Mouse Redragon";
        preco = "54,89";
        estoque = "19";
        linha = nomeProduto + ";" + preco + ";" + estoque;
        arqGravacao.write(linha);

        arqGravacao.close();
    }
}
