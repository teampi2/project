import Typography, { TypographyProps } from '@mui/material/Typography'
import { styled } from '@mui/material/styles'

interface TruncateProps extends TypographyProps {
  width: number | string
}

const StyledTypography = styled(Typography)<TruncateProps>(({ width }) => ({
  width,
  overflow: 'hidden',
  whiteSpace: 'nowrap',
  textOverflow: 'ellipsis',
}))

export function Truncate(props: TruncateProps) {
  return <StyledTypography noWrap {...props} />
}
