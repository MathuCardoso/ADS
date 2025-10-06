#include <stdio.h>
int main()
{
    int num;

    printf("Digite um numero: ");
    scanf("%d", &num);

    if(num > 10 && num < 100) {
        printf("%d esta entre 10 e 100.", num);
    } else {
        printf("%d nao esta entre 10 e 100.", num);
    }
    
    return 0;
}
