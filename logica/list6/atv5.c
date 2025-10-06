#include <stdio.h>
int main()
{
    int n;

    printf("\nEntre com um numero entre 0 e 10: ");
    scanf("%d", &n);

    do{
        printf("\nEntre com um numero entre 0 e 10: ");
        scanf("%d", &n);
    }
    while (0 <= n && n <= 10);
    
    if (0 > n || n > 10){
        printf("Numero fora do intervalo!");
    }

    return 0;
}
