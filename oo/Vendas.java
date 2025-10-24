
import java.io.BufferedReader;
import java.io.FileReader;

public class Vendas {

    public static void main(String[] args) throws Exception {

        String nomeArquivo = "arquivos/vendas.csv";
        BufferedReader arqLeitura = new BufferedReader(new FileReader(nomeArquivo));
        String strFinal;

        String linha;
        int qtdVendas = 0;
        arqLeitura.readLine();
        while ((arqLeitura.readLine()) != null) {
            qtdVendas++;
        }
        arqLeitura.close();

        strFinal = "Quantidade de vendas: " + qtdVendas + "\n";

        arqLeitura = new BufferedReader(new FileReader(nomeArquivo));
        float totalVendas = 0;
        String vendaStr;
        arqLeitura.readLine();
        while ((linha = arqLeitura.readLine()) != null) {
            String vetCampos[] = linha.split(";");
            vendaStr = vetCampos[2].replace(",", ".");
            float venda = Float.parseFloat(vendaStr);
            totalVendas = totalVendas + venda;
        }

        arqLeitura.close();
        strFinal += "Valor total das vendas: " + totalVendas + "\n";

        arqLeitura = new BufferedReader(new FileReader(nomeArquivo));

        float p = 0;
        float v = 0;
        arqLeitura.readLine();
        while ((linha = arqLeitura.readLine()) != null) {
            String vetCampos[] = linha.split(";");
            String campo = vetCampos[3];
            String valor = vetCampos[2].replace(",", ".");
            if (campo.equals("P")) {
                p += Float.parseFloat(valor);
            } else if (campo.equals("V")) {
                v += Float.parseFloat(valor);

            }
        }
        arqLeitura.close();

        strFinal += "Valor total das vendas À VISTA: " + v + "\n";
        strFinal += "Valor total das vendas À PRAZO: " + p + "\n";

        System.out.println(strFinal);
    }
}
