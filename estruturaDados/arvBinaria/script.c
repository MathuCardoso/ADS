#include <stdio.h>
#include <locale.h>
#include <stdlib.h>
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
        printf("\n%d inserido com sucesso.\n", valor);
    }
    else if (valor < (*a)->dado)
    {
        insereArvore(&((*a)->esq), valor);
    }
    else if (valor > (*a)->dado)
    {
        insereArvore(&((*a)->dir), valor);
    }
    else
    {
        printf("\nValor ja existe... tente outro.\n");
        return;
    }
}

void antecessor(Arvore a, Arvore *x)
{
    Arvore aux;
    if ((*x)->dir != NULL)
    {
        antecessor(a, &((*x)->dir));
    }
    else
    {
        a->dado = (*x)->dado;
        aux = *x;
        *x = aux->esq;
        free(aux);
    }
}

void retiraArvore(Arvore *a, int valor)
{
    Arvore aux;
    if (*a != NULL)
    {

        if (valor > ((*a)->dado))
        {
            retiraArvore(&((*a)->dir), valor);
        }
        else if (valor < ((*a)->dado))
        {
            retiraArvore(&((*a)->esq), valor);
        }
        else
        {
            if ((*a)->dir == NULL)
            {

                aux = (*a);
                *a = aux->esq;
                free(aux);
                printf("Removido\n");
            }
            else if ((*a)->esq == NULL)
            {

                aux = (*a)->dir;
                free(*a);
                *a = aux;
                printf("Removido\n");
            }
            else
            {
                antecessor(*a, &((*a)->esq));
            }
        }
    }
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
    int valor = 0;

    while (TRUE)
    {

        printf("============================================\n");
        printf("[1] - [INSERIR ELEMENTO]\n");
        printf("[2] - [RETIRAR ELEMENTO]\n");
        printf("[3] - [BUSCAR ELEMENTO]\n");
        printf("[4] - [IMPRIMIR ÁRVORE EM PRÉ-ORDEM]\n");
        printf("[5] - [IMPRIMIR ÁRVORE EM ORDEM CRESCENTE]\n");
        printf("[6] - [IMPRIMIR ÁRVORE EM PÓS-ORDEM]\n");
        printf("[0] - [SAIR]\n");
        printf("Escolha uma das opçoes acima: ");
        scanf("%d", &opcao);

        switch (opcao)
        {
        case 1:
            printf("\nDigite o valor a ser inserido: ");
            scanf("%d", &valor);
            printf("\n");
            insereArvore(&arvore, valor);
            break;

        case 2:
            printf("\nDigite o valor a ser deletado: ");
            scanf("%d", &valor);
            printf("\n");
            retiraArvore(&arvore, valor);
            break;

        case 3:
            printf("\nDigite o valor a ser buscado: ");
            scanf("%d", &valor);
            printf("\n");
            if (buscaArvore(arvore, valor))
            {
                printf("O valor existe na árvore.\n");
            }
            else
            {
                printf("O elemento não existe na árvore.\n");
            }
            break;

        case 4:
            printf("\n");
            preOrdem(arvore);
            printf("\n");
            break;

        case 5:
            printf("\n");
            inOrdemAsc(arvore);
            printf("\n");
            break;

        case 6:
            printf("\n");
            posOrdem(arvore);
            printf("\n");
            break;

        case 0:
            printf("\nSaindo...");
            return 0;
            break;

        default:
            break;
        }
    }

    return 0;
}