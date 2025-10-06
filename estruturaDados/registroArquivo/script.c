#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
#define TAM 40

struct Aluno
{
    char nome[40];
    int matricula;
    float nota1;
    float nota2;
    float media;
    int faltas;
    char situacao[10];
};

struct Turma
{
    struct Aluno alunos[TAM];
    int qtdAlunos;
};
struct Turma t;

void insertAlunos()
{

    for (int i = t.qtdAlunos; i < TAM; i++)
    {
        struct Aluno *a = &t.alunos[i];
        printf("Aluno %d\n", i + 1);
        int c;
        while ((c = getchar()) != '\n' && c != EOF)
            ;
        printf("(Pressione [ENTER] para sair do sistema)\n");
        printf("Nome do aluno:");
        fgets(a->nome, sizeof(a->nome), stdin);
        a->nome[strcspn(a->nome, "\n")] = '\0';

        if (strcmp(a->nome, "") == 0)
        {
            break;
        }

        printf("\nNúmero de matrícula:");
        scanf("%d", &a->matricula);

        printf("\nNota da prova 1:");
        scanf("%f", &a->nota1);

        printf("\nNota da prova 2:");
        scanf("%f", &a->nota2);

        a->media = (a->nota1 + a->nota2) / 2;

        printf("\nNúmero de faltas:");
        scanf("%d", &a->faltas);

        if (a->media >= 6 && a->faltas <= 20)
        {
            strcpy(a->situacao, "APROVADO");
        }
        else if (a->media < 6 || a->faltas > 20)
        {
            strcpy(a->situacao, "REPROVADO");
        }
        t.qtdAlunos++;
        printf("\nALUNO INSERIDO COM SUCESSO!\n");
    }
}

void showAlunos()
{
    if (t.qtdAlunos > 0)
    {
        if (t.qtdAlunos == 1)
            printf("%d ALUNO\n", t.qtdAlunos);
        else
            printf("%d ALUNOS\n", t.qtdAlunos);

        for (int i = 0; i < t.qtdAlunos; i++)
        {
            struct Aluno *a = &t.alunos[i];

            printf("===================================\n");
            printf("ALUNO %d\n", i + 1);
            printf("NOME: %s\n", a->nome);
            printf("MATRÍCULA: %d\n", a->matricula);
            printf("NOTA 1: %.2f\n", a->nota1);
            printf("NOTA 2: %.2f\n", a->nota2);
            printf("MÉDIA: %.2f\n", a->media);
            printf("FALTAS: %d\n", a->faltas);
            printf("SITUAÇÃO: %s\n", a->situacao);
            printf("===================================\n");
        }
    }
}

void salvarDados()
{
    FILE *arquivo;
    arquivo = fopen("turma.txt", "w");

    if (arquivo == NULL)
    {
        printf("Erro ao salvar os dados.");
        return;
    }

    for (int i = 0; i < t.qtdAlunos; i++)
    {
        struct Aluno *a = &t.alunos[i];

        fprintf(arquivo, "\nNOME: %s\n", a->nome);
        fprintf(arquivo, "MATRÍCULA: %d\n", a->matricula);
        fprintf(arquivo, "NOTA 1: %.2f\n", a->nota1);
        fprintf(arquivo, "NOTA 2: %.2f\n", a->nota2);
        fprintf(arquivo, "MÉDIA: %.2f\n", a->media);
        fprintf(arquivo, "FALTAS: %d\n", a->faltas);
        fprintf(arquivo, "SITUAÇÃO: %s\n", a->situacao);
    }
    fclose(arquivo);

    printf("Dados salvos com sucesso!\n");
}

void carregarDados() {
    FILE *arquivo = fopen("turma.txt", "r");
    if(arquivo == NULL) {
        printf("Não foi possível encontrar o arquivo.");
        return;
    }

    struct Aluno a;
    char linha[100];

    while (fgets(linha, sizeof(linha), arquivo)) {
    if (sscanf(linha, "NOME: %[^\n]", a.nome)) {}
    else if (sscanf(linha, "MATRÍCULA: %d", &a.matricula)) {}
    else if (sscanf(linha, "NOTA 1: %f", &a.nota1)) {}
    else if (sscanf(linha, "NOTA 2: %f", &a.nota2)) {}
    else if (sscanf(linha, "MÉDIA: %f", &a.media)) {}
    else if (sscanf(linha, "FALTAS: %d", &a.faltas)) {}
    else if (sscanf(linha, "SITUAÇÃO: %s", a.situacao)) {
        // quando chegamos na situação, já temos o aluno completo
        t.alunos[t.qtdAlunos++] = a;
    }
}


}

int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");
    t.qtdAlunos = 0;
    while (1)
    {

        printf("=====MENU=====\n");
        printf("[1] - INSERIR ALUNOS\n");
        printf("[2] - EXIBIR ALUNOS\n");
        printf("[3] - SALVAR DADOS\n");
        printf("[4] - CARREGA DADOS\n");
        printf("[5] - SAIR\n");

        int opcao;
        printf("Escolha uma das opções:\n");
        scanf("%d", &opcao);
        while ((opcao > 5 || opcao < 1))
        {
            printf("Escolha uma das opções:\n");
            scanf("%d", &opcao);
        }

        if (opcao == 1)
        {
            insertAlunos();
        }
        else if (opcao == 2)
        {
            showAlunos();
        }

        else if (opcao == 3)
        {
            salvarDados();
        }
        else if (opcao == 4)
        {
            carregarDados();
        }
    }

    return 0;
}