public class ExemploString {
    public static void main(String[] args) {
        String str1, str2, str3;
        str1 = "Um texto qualquer...   ";
        System.out.println("[" + str1 + "]");
        str1 = str1.trim();
        System.out.println("Após o trim: [" + str1 + "]");
        System.out.println("Tamanho do str1: " + str1.length());

        //substituir um substring dentro de um String
        str2 = str1.replace("texto", "teste");
        System.out.println("[" + str2 + "]");
        str2 = str2.replace("t", "AAA");
        System.out.println("[" + str2 + "]");

        //extrair um substring
        str2 = str1.substring(6, 10);//6 inclusive, 10 exclusive
        System.out.println(str2);

        //procurar substring
        str1 = "mathcardoso792@gmail.com";
        int posicao = str1.indexOf("@");
        System.out.println("@ está na posição " + posicao);
        System.out.println("Usuário: " + str1.substring(0, str1.indexOf("@")));
        String dominio = str1.substring(str1.indexOf("@") + 1);
        System.out.println("Domínio: " + dominio.toUpperCase());

        //converter de outros tipos para String

        int valor = 5;
        str3 = String.valueOf(valor);
        System.out.println("Valor: " + str3);

        //quebrar um String em vetor
        String valores = "4/7/22/7/0/5";
        String[] arrayValores = valores.split("/");
        System.out.println("ArrayValores[1] = " + arrayValores[1]);

        for(int i = 0; i < arrayValores.length; i++) {
            System.out.println(arrayValores[i]);
        }
        
    }
}
