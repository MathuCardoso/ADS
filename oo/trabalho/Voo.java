
public class Voo {

    private String codigoVoo;
    private String origem;
    private String destino;
    private String data;
    private String horario;
    private int qtdPassageiros;
    private Passageiro[] passageiros;

    public Voo() {
        this.passageiros = new Passageiro[50];
    }

    public String getCodigoVoo() {
        return this.codigoVoo;
    }

    public void setCodigoVoo(String codigoVoo) {
        this.codigoVoo = codigoVoo;
    }

    public String getOrigem() {
        return this.origem;
    }

    public void setOrigem(String origem) {
        this.origem = origem;
    }

    public String getDestino() {
        return this.destino;
    }

    public void setDestino(String destino) {
        this.destino = destino;
    }

    public String getHorario() {
        return this.horario;
    }

    public void setHorario(String horario) {
        this.horario = horario;
    }

    public int getQtdPassageiros() {
        return this.qtdPassageiros;
    }

    public void setQtdPassageiros(int qtdPassageiros) {
        this.qtdPassageiros = qtdPassageiros;
    }

    public Passageiro getPassageiro(int pos) {
        return this.passageiros[pos];
    }

    public void setPassageiros(Passageiro p) {
        if (qtdPassageiros < 50) {
            this.passageiros[qtdPassageiros] = p;
            qtdPassageiros++;
        }
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

    public boolean mesmoAssento(int assento) {
        boolean mesmoAssento = false;
        for (int i = 0; i < qtdPassageiros; i++) {
            if (assento == this.passageiros[i].getNumAssento()) {
                mesmoAssento = true;
                break;
            } else {
                mesmoAssento = false;
            }
        }
        return mesmoAssento;
    }

    public int getAssentosLivres() {
        return 50 - qtdPassageiros;
    }

}
