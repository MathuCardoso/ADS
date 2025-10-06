import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class ExemploVet2 {
    public static void main(String[] args) throws IOException {
         BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));

        int num = -1; 
        Meses meses = new Meses();
        while(num != 0) {
            System.out.println("Informe o número do mês, ou 0 para sair: ");
            num = Integer.parseInt(reader.readLine());
            String mes = meses.pegarNomeMes(num);
            if(!mes.equals("")) {
                System.out.println("O mês informado é: " + mes);
            } else if(num != 0) {
                System.out.println("Valor inválido.");
            }
        
        }

    }
}
