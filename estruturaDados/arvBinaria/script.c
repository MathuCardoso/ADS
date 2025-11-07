#include <stdio.h>
#include <locale.h>
#define TRUE 1
#define FALSE 0

struct Elemento
{
    int dado;
    struct Elemento *esq;
    struct Elemento *dir;
};
typedef struct Elemento *Arvore;

Arvore criaArvore()
{
    return NULL;
}

void insereArvore(Arvore *a, int valor)
{
    if ((*a) == NULL)
    {
        (*a) = (Arvore)malloc(sizeof(struct Elemento));
        (*a)->dado = valor;
        (*a)->esq = NULL;
        (*a)->dir = NULL;
    }
    else if (valor < (*a)->dado)
        insereArvore(&((*a)->esq), valor);
    else if (valor > (*a)->dado)
        insereArvore(&((*a)->dir), valor);
    else
        printf("\nValor ja existe... tente outro.\n");
}

Arvore buscaArvore(Arvore a, int valor)
{
    if (a == NULL)
    {
        return NULL;
    }
    else if (valor < a->dado)
        return buscaArvore(a->esq, valor);
    else if (valor > a->dado)
        return buscaArvore(a->dir, valor);
    else
        return a;
}

void preOrdem(Arvore a)
{
    if (a != NULL)
    {
        printf("\n%d", a->dado);
        preOrdem(a->esq);
        preOrdem(a->dir);
    }
}

void inOrdemAsc(Arvore a)
{
    if (a != NULL)
    {
        inOrdemAsc(a->esq);
        printf("\n%d", a->dado);
        inOrdemAsc(a->dir);
    }
}

void inOrdemDesc(Arvore a)
{
    if (a != NULL)
    {
        inOrdemDesc(a->dir);
        printf("\n%d", a->dado);
        inOrdemDesc(a->esq);
    }
}

void posOrdem(Arvore a)
{
    if (a != NULL)
    {
        posOrdem(a->esq);
        posOrdem(a->dir);
        printf("\n%d", a->dado);
    }
}

int main()
{
    Arvore arvore = criaArvore();

    int opcao;

    while (TRUE)
    {

        printf("============================================\n");
        printf("[1] - [INSERIR ELEMENTO]\n");
        printf("[2] - [BUSCAR ELEMENTO]\n");
        printf("[3] - [IMPRIMIR ÁRVORE EM PRÉ-ORDEM]\n");
        printf("[4] - [IMPRIMIR ÁRVORE EM ORDEM CRESCENTE]\n");
        printf("[5] - [IMPRIMIR ÁRVORE EM PÓS-ORDEM]\n");
        printf("Escolha uma das opçoes acima: ");
        scanf("%d", &opcao);

        switch (opcao)
        {
        case 1:
            int valor = 0;
            printf("\nDigite o valor a ser inserido: ");
            scanf("%d", &valor);
            insereArvore(arvore, valor);
            break;
        case 2:
            

        default:
            break;
        }
    }

    return 0;
}