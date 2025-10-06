
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class Exemplo3 {
    public static void main(String[] args) throws IOException {
        Pet pet1 = new Pet();
        Pet pet2 = new Pet();
        BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));

        System.out.println("Digite o nome do seu pet: ");
        pet1.nome = reader.readLine();

        System.out.println("Digite a especie do seu pet: ");
        pet1.especie = reader.readLine();

        System.out.println("Digite a idade do seu pet: ");
        pet1.idade = Integer.parseInt(reader.readLine());

        System.out.println(
        "O cliente é a " + pet1.nome + " da espécie " + 
        pet1.especie + " e tem " + pet1.idade + " anos de idade");


        pet2.nome = "Pocoió";
        pet2.especie = "Cavalo";
        pet2.idade = 29;

    }
}
