#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
#include <string.h>
#define TamMax 100

int elementsCount = 0;

char lista[TamMax][50];

void insertElements()
{
    char elemento[50];
    int i = elementsCount;
    printf("Digite 'S' para sair do sistema\n");

    while (i < TamMax)
    {
        printf("Digite o %dº elemento\n", i + 1);
        fgets(elemento, sizeof(elemento), stdin);
        elemento[strcspn(elemento, "\n")] = '\0';
        if (strcmp(elemento, "S") == 0)
        {
            break;
        }
        strcpy(lista[i], elemento);
        i++;
        elementsCount++;
    }
}

void showElementos()
{
    printf("\n===ELEMENTOS=DA=LISTA===\n");
    for (int i = 0; i < elementsCount; i++)
    {
        printf("[%d] - %s\n", i + 1, lista[i]);
    }
    printf("========================\n\n");
}

void qtdElementos()
{
    printf("\n%d ELEMENTOS NA LISTA\n\n", elementsCount);
}

void resetList()
{
    for (int i = 0; i < elementsCount; i++)
    {
        lista[i][0] = '\0';
    }

    elementsCount = 0;
}

void deleteElemento()
{
    int el;
    int achou = 0;
    printf("Número do elemento a excluir: \n");
    scanf("%d", &el);
    el--;

    for (int i = 0; i < elementsCount; i++)
    {
        if (i == el && strlen(lista[i]) > 1)
        {
            lista[i][0] = '\0';
            elementsCount--;
            printf("Elemento excluído com sucesso.\n");
            achou = 1;
            for (int j = i; j < elementsCount; j++)
            {
                strcpy(lista[j], lista[j + 1]);
            }

            break;
        }
    }
    if (!achou)
        printf("Elemento não encontrado\n");
}

int main()
{
    system("chcp 65001 > nul");
    setlocale(LC_ALL, ".utf8");

    insertElements();
    int op = 0;

    while (1)
    {

        printf("===MENU===\n");
        printf("Escolha uma das opções abaixo:\n");
        printf("[1] - INSERIR ELEMENTO\n");
        printf("[2] - EXIBIR ELEMENTOS\n");
        printf("[3] - QUANTIDADE DE ELEMENTOS\n");
        printf("[4] - CRIAR NOVA LISTA\n");
        printf("[5] - EXCLUIR UM ITEM DA LISTA\n");
        printf("[6] - SAIR\n");
        scanf("%d", &op);
        getchar();
        while (op > 6 || op < 1)
        {
            printf("===OPÇÃO=INVÁLIDA===\n");
            printf("Escolha uma das opções abaixo:\n");
            printf("[1] - INSERIR ELEMENTO\n");
            printf("[2] - EXIBIR ELEMENTOS\n");
            printf("[3] - QUANTIDADE DE ELEMENTOS\n");
            printf("[4] - CRIAR NOVA LISTA\n");
            printf("[5] - EXCLUIR UM ITEM DA LISTA\n");
            printf("[6] - SAIR\n");
            scanf("%d", &op);
            getchar();
        }

        if (op == 1)
        {
            insertElements();
        }
        else if (op == 2)
        {
            showElementos();
        }
        else if (op == 3)
        {
            qtdElementos();
        }
        else if (op == 4)
        {
            resetList();
        }
        else if (op == 5)
        {
            deleteElemento();
        }
        else if (op == 6)
        {
            printf("Saindo...");
            break;
        }
    }

    return 0;
}