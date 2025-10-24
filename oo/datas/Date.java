import java.util.Date;
import java.text.DateFormat;
import java.text.SimpleDateFormat;

public class Date {

    public static void main(String[] args) {
        Date agora = new Date();
        System.out.println(agora);

        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
        String dataFormatada = sdf.format(agora);

        System.out.println(dataFormatada);

        DateFormat df = DateFormat.getDateInstance(DateFormat.SHORT);
        System.out.println("SHORT " + df.format(agora));

        df = DateFormat.getDateInstance(DateFormat.MEDIUM);
        System.out.println("SHORT " + df.format(agora));

        df = DateFormat.getDateInstance(DateFormat.LONG);
        System.out.println("SHORT " + df.format(agora));

    }

}
