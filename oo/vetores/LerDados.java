import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class LerDados {
    public static void main(String[] args) throws IOException{
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));

        String linha = "";
        System.out.println("Digite alguma coisa ou S para sair:");
        while (!linha.toUpperCase().equals("S")) {
            linha = reader.readLine();
            System.out.println("Você digitou: " + linha);
        }

        System.out.println(linha);

    }
}
