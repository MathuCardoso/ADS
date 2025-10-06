
public class Companhia {

    private String nome;
    private String telefone;
    private int qtdVoos;
    private Voo[] voos;

    public Companhia() {
        this.voos = new Voo[10];
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public int getQtdVoos() {
        return qtdVoos;
    }

    public void setQtdVoos(int qtdVoos) {
        this.qtdVoos = qtdVoos;
    }

    public Voo getVoo(int pos) {
        return this.voos[pos];
    }

    public void setVoo(Voo v) {
        if (this.qtdVoos < 10) {
            this.voos[qtdVoos] = v;
            qtdVoos++;
        }
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }
}
