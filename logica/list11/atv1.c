#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
#define TAM 100
int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    struct TPessoa
    {
        int codigo;
        char nome[75];
        char genero;
        int idade;
        float altura;
        float peso;
    };

    struct TPessoa cadastro[TAM];
    int n = 0;
    int i, p, campo;
    int resp = 0;

    printf("Quantas pessoas você quer cadastrar?");
    scanf("%d", &n);
    while (getchar() != '\n')
        ;

    for (i = 0; i < n; i++)
    {
        cadastro[i].codigo = i;
        printf("\nDigite o nome da pessoa:");
        fgets(cadastro[i].nome, sizeof(cadastro[i].nome), stdin);

        printf("\nDigite o gênero da pessoa [H][M]:");
        scanf(" %c", &cadastro[i].genero);

        printf("\nDigite a idade da pessoa:");
        scanf("%d", &cadastro[i].idade);

        printf("\nDigite a altura da pessoa:");
        scanf("%f", &cadastro[i].altura);

        printf("\nDigite o peso da pessoa:");
        scanf("%f", &cadastro[i].peso);
        while (getchar() != '\n')
            ;
    }

    while (1)
    {

        printf("-_-_-_-_-_-_-_-_-_-_-_MENU-_-_-_-_-_-_-_-_-_-_\n");
        printf("-_-_-_-_ESCOLHA UMA DAS OPÇÕES ABAIXO:-_-_-_-_\n");
        printf("[1] - CADASTRAR PESSOA;\n");
        printf("[2] - ALTERAR OS DADOS DE UMA PESSOA;\n");
        printf("[3] - EXCLUIR UMA PESSOA;\n");
        printf("[4] - MOSTRAR OS DADOS DE UMA PESSOA;\n");
        printf("[5] - MOSTRAR OS DADOS DE TODAS AS PESSOAS;\n");

        scanf("%d", &resp);
        while (getchar() != '\n');

        if (resp == 1)
        {
            i = n;

            cadastro[i].codigo = i;
            printf("Digite o nome da pessoa:");
            fgets(cadastro[i].nome, sizeof(cadastro[i].nome), stdin);
            cadastro[i].nome[strcspn(cadastro[i].nome, "\n")] = '\0';

            printf("Digite o gênero da pessoa [H][M]:");
            scanf(" %c", &cadastro[i].genero);

            printf("Digite a idade da pessoa:");
            scanf("%d", &cadastro[i].idade);

            printf("Digite a altura da pessoa:");
            scanf("%f", &cadastro[i].altura);

            printf("Digite o peso da pessoa:");
            scanf("%f", &cadastro[i].peso);
            while (getchar() != '\n')
                ;
            n++;
        }
        else if (resp == 2)
        {
            p = 0;
            campo = 0;

            while (campo != 6)
            {


                printf("\nQual pessoa deseja editar? Informe o código:");
                scanf("%d", &p);

                printf("Nome da pessoa que deseja alterar: %s\n", cadastro[p].nome);
                printf("Qual campo deseja alterar?\n");
                printf("\n[1] - NOME");
                printf("\n[2] - IDADE");
                printf("\n[3] - GENERO");
                printf("\n[4] - ALTURA");
                printf("\n[5] - PESO");
                printf("\n[6] - SAIR\n");
                scanf("%d", &campo);
                while (getchar() != '\n');

                if (campo == 1)
                {
                    printf("Nome atual: %s\n", cadastro[p].nome);
                    printf("Digite o novo nome do usuário: ");
                    fgets(cadastro[p].nome, sizeof(cadastro[p].nome), stdin);
                    cadastro[p].nome[strcspn(cadastro[p].nome, "\n")] = '\0';
                    printf("Nome alterado com sucesso!\n");
                }
                else if (campo == 2)
                {
                    printf("Idade atual: %d\n", cadastro[p].idade);
                    printf("Digite a nova idade do usuário: ");
                    scanf("%d", &cadastro[p].idade);
                    printf("Idade alterado com sucesso!\n");
                }
                else if (campo == 3)
                {
                    printf("Genero atual: %c\n", cadastro[p].genero);
                    printf("Digite o novo gênero do usuário: ");
                    scanf(" %c", &cadastro[p].genero);
                    printf("Gênero alterado com sucesso!\n");
                }
                else if (campo == 4)
                {
                    printf("Altura atual: %.2f\n", cadastro[p].altura);
                    printf("Digite a nova altura do usuário: ");
                    scanf("%f", &cadastro[p].altura);
                    printf("Altura alterada com sucesso!\n");
                }
                else if (campo == 5)
                {
                    printf("Peso atual: %.2f\n", cadastro[p].peso);
                    printf("Digite o novo peso do usuário: ");
                    scanf("%f", &cadastro[p].peso);
                    printf("Peso alterado com sucesso!\n");
                }
            }
        }
        else if (resp == 3)
        {
            printf("Digite o código da pessoa que deseja excluir: ");
            scanf("%d", &p);

            strcpy(cadastro[p].nome, "");
            cadastro[p].altura = 0;
            cadastro[p].idade = 0;
            cadastro[p].peso = 0;
            cadastro[p].genero = ' ';
            cadastro[p].codigo = -1;

            printf("Usuário excluido com sucesso.");
        }
        else if (resp == 4)
        {
            printf("Informe o código da pessoa que deseja visualizar: \n");
            scanf("%d", &p);

            printf("\n%d\n", cadastro[p].codigo);
            printf("%s\n", cadastro[p].nome);
            printf("%d\n", cadastro[p].idade);
            printf(" %c\n", cadastro[p].genero);
            printf("%.2f\n", cadastro[p].altura);
            printf("%.2f\n", cadastro[p].peso);
        }
        else if (resp == 5)
        {
            for (i = 0; i < n; i++)
            {
                printf("\nCódigo: %d\n", cadastro[i].codigo);
                printf("Nome: %s\n", cadastro[i].nome);
                printf("Idade: %d\n", cadastro[i].idade);
                printf("Genero: %c\n", cadastro[i].genero);
                printf("Altura: %.2f\n", cadastro[i].altura);
                printf("Peso: %.2f\n\n", cadastro[i].peso);
            }
        }
    }

    return 0;
}