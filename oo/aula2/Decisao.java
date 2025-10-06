public class Decisao {
    public static void main(String args[]) {
        if(args.length < 2) {
            System.out.println("Precisa de 2 parametros");
            System.exit(0);
        }
        OpMat opMat = new OpMat();
        int v1 = Integer.parseInt(args[0]);
        int v2 = Integer.parseInt(args[1]);
        System.out.println(args[0] + " * " + args[1] + "= " + opMat.multi(v1, v2));

    }
}
