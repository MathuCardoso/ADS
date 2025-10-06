package tabelaCores;

import java.io.BufferedWriter;
import java.io.FileWriter;

public class TabelaCores {

    public static void main(String[] args) throws Exception {
        String nomeArqSaida = "tabela.html";
        BufferedWriter fileReader = new BufferedWriter(new FileWriter(nomeArqSaida));

        String headHtml = """
<html> 
    <head> 
    <title>Tabela de Cores HTML</title> 
    <meta http - equiv ='Content-Type'content ='text/html; charset=UTF-8'>
    </head> 
    <body>
""";
        fileReader.write(headHtml);
        fileReader.newLine();

        String tableHeaderHtml = """
                <table width='400' align='center' border='1'>
                <tr>
                    <th width='200' align='center'>Cor</th>
                    <th width='200' align='center'>Código Hexadecimal</th>
                </tr>
                """;
        fileReader.write(tableHeaderHtml);
        fileReader.newLine();

        for (int r = 0x00; r < 0xF0; r += 0x10) {
            for (int g = 0x00; g < 0xF0; g += 0x10) {
                for (int b = 0x00; b < 0xF0; b += 0x10) {
                    String hexColor = String.format("%02X%02X%02X", r, g, b);
                    String colorTable = "<tr><td bgcolor='" + hexColor + "'> <td align='center'>#" + hexColor + "</td>";
                    fileReader.write(colorTable);
                    fileReader.newLine();
                }
                fileReader.write("</tr>");
                fileReader.newLine();
            }

        }

        String footerHtml = "</table></body></html>";
        fileReader.write(footerHtml);
        fileReader.newLine();
    }
}
