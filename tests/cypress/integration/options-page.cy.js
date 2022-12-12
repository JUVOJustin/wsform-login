describe('empty spec', () => {
  beforeEach(() => {
    cy.logIn()
  })

  it('Options Page exists', () => {
    cy.visit('/wp-admin/options-general.php?page=wsform_login');
    cy.url().should('contain', 'page=wsform_login')
  });
})