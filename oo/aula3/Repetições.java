public class Repetições {
    public static void main(String[] args) {
        int qtde = 5;
        System.out.println("Repetições fo tipo for: ");
        for(int i = 0; i < qtde; i++) {
            System.out.println(i);
        }

        int cont = 0;
        while(cont <= qtde) {
            System.out.println(cont);
            cont++;
        }
    }

}
