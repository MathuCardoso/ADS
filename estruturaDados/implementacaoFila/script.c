#include <stdio.h>
#include <stdlib.h>
#define TRUE 1
#define FALSE 0

struct elemento
{
    int dado;
    struct elemento *prox;
};
typedef struct elemento *ApElemento;

typedef struct
{
    ApElemento ini;
    ApElemento fim;
} Fila;

Fila criaFila()
{
    Fila f;
    f.ini = NULL;
    f.fim = NULL;
    return f;
}

int filaVazia(Fila f)
{
    if (f.ini == NULL)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

Fila insereFila(Fila f, int e)
{
    ApElemento novo;
    novo = (ApElemento)malloc(sizeof(struct elemento));
    novo->dado = e;
    novo->prox = NULL;

    if (filaVazia(f))
    {
        f.ini = novo;
        f.fim = novo;
    }
    else
    {
        f.fim->prox = novo;
        f.fim = novo;
    }
    return f;
}

Fila retiraFila(Fila f, int *e)
{
    ApElemento ap;

    if (!filaVazia(f))
    {
        *e = f.ini->dado;
        ap = f.ini;
        f.ini = f.ini->prox;
        free(ap);
        if (filaVazia(f))
            f.fim = NULL;
    }
    else
    {
        *e = -1;
        printf("\nFila Vazia\n");
    }
    return f;
}

void imprimeFila(Fila f)
{
    ApElemento ap;
    ap = f.ini;
    if (ap == NULL)
    {
        printf("\nA FILA ESTÁ FILA VAZIA!\n");
    }
    else
    {
        printf("\nItens da fila:\n");
        ap = f.ini;
        while (ap != NULL)
        {
            printf("%d - ", ap->dado);
            ap = ap->prox;
        }
        printf("\n");
    }
}

int main()
{
    Fila f = criaFila();
    int opcao, dado;

    while (TRUE)
    {
        printf("=============================================n");
        printf("Opcoes:\n");
        printf("[1] - [INSERIR ELEMENTO NO FINAL DA FILA]\n");
        printf("[2] - [RETIRAR ELEMENTO DO INÍCIO DA FILA]\n");
        printf("[3] - [IMPRIMIR CONTEÚDO DA FILA]\n");
        printf("[4] - [SAIR]\n");
        printf("Escolha uma das opções acima: ");
        scanf("%d", &opcao);

        switch (opcao)
        {
        case 1:
            printf("\n[INSERIR ELEMENTO]\n");
            printf("Digite o valor a ser inserido: ");
            scanf("%d", &dado);
            f = insereFila(f, dado);
            printf("Elemento %d inserido.\n", dado);
            break;
        case 2:
            f = retiraFila(f, &dado);
            if (dado != -1)
            {
                printf("O elemento '%d' foi retirado do início da fila \n", dado);
            }
            break;
        case 3:
            imprimeFila(f);
            break;
        case 4:
            printf("Saindo...");
            return 0;
            break;
        default:
            printf("OPÇÃO INVÁLIDA!\n");
        }
    }

    return 0;
}
