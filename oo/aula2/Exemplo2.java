import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Exemplo2 {
    public static void main(String args[]) throws IOException{
        BufferedReader reader = 
            new BufferedReader (new InputStreamReader(System.in));
        // System.out.println("O parâmetro informado foi " + args[0]);
        System.out.println("Digite seu nome: ");
        String nome = reader.readLine();
        System.out.println(nome);

    }
}