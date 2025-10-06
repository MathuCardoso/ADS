#include <stdio.h>
int main()
{
    int ni, nf;

    printf("Digite um numero: ");
    scanf("%d", &ni);

    printf("Digite outro numero (este numero precisa ser superior ao outro.): ");
    scanf("%d", &nf);
    
    printf("Valor inicial: %d\nValor final: %d", ni, nf);
    printf("\nValor final: %d");
    while (ni <= nf)
    {
    printf("%d\n", ni);
        
        ni++;
    }
    

    return 0;
}
