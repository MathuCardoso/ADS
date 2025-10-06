
public class Escola {

    private String nome;
    private String fone;
    private int qtdTurmas;
    private Turma[] vetTurmas;

    public Escola() {
        this.vetTurmas = new Turma[20];
    }

    public String getNome() {
        return this.nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getFone() {
        return this.fone;
    }

    public void setFone(String fone) {
        this.fone = fone;
    }

    public int getQtdTurmas() {
        return this.qtdTurmas;
    }

    public void setQtdTurmas(int qtdTurmas) {
        this.qtdTurmas = qtdTurmas;
    }

    public Turma getTurma(int pos) {
        return vetTurmas[pos];
    }

    public void setTurma(Turma t) {
        if (this.qtdTurmas < 20) {
            this.vetTurmas[qtdTurmas] = t;
            qtdTurmas++;
        }
    }
}
