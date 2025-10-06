import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class ExemploVet1 {
    public static void main(String[] args) throws IOException {
         BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));



        int num = -1; 

        while(num != 0) {
            System.out.println("Informe o número do mês, ou 0 para sair: ");
            num = Integer.parseInt(reader.readLine());
            
        
        }

    }
}
